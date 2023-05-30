<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function __construct(OrderServiceInterface $orderService,
                                OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService ;
        $this->orderDetailService = $orderDetailService ;
    }
    public function index()
    {
        $carts=  Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('frontend.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request)
    {
        //Thêm đơn hàng
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrders;
        $order = $this->orderService->create($data);
        //Thêm chi tiết đơn hàng
        $carts = Cart::content();
        foreach ($carts as $cart){
            $data = [
                'order_id'=>$order->id,
                'product_id'=>$cart->id,
                'qty'=>$cart->qty,
                'amount'=>$cart->price,
                'total'=>$cart->price*$cart->qty,
            ];
            $this->orderDetailService->create($data);
        }

        if($request->payment_type == 'pay_later'){
            //Gửi email
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal);//Gọi hàm gửi email đã định nghĩa

            //Xóa giỏ hàng
            Cart::destroy();
            //Trả về kết quả thông báo
            return redirect('checkout/result')
                ->with('notification', 'Success! You will pay on delivery. Please check your email.');
        }
        if($request->payment_type == 'online_payment'){
            //Lấy URL thanh toán VNPay
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef'=>$order->id,//ID đơn hàng
                'vnp_OrderInfo'=>'Mô tả ở đây',//Mô tả đơn hàng
                'vnp_Amount'=>Cart::total(0, '', '')*23470,//Tổng giá đơn hàng nhân với tỉ giá usd để chuyển sang tiền việt
            ]);
            //Chuyển hướng tới URL lấy được
            return  redirect()->to($data_url);
        }

    }

    public function vnPayCheck(Request $request)
    {
        //Lấy data từ URL(do VNPay gửi về $vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');//Mã phản hồi kết quả thanh toán. 00= Thành công
        $vnp_TxnRef = $request->get('vnp_TxnRef');//order_id
        $vnp_Amount = $request->get('vnp_Amount');//Số tiền thanh toán

        //Kiểm tra data, xem kết quả giao dịch trở về từ VNPay hợp lệ không
        if($vnp_ResponseCode != null){
            //Nếu thành công
            if($vnp_ResponseCode==00){
                //Cập nhập trạng thái Order
                $this->orderService->update(['status' => Constant::order_status_Paid], $vnp_TxnRef);

                //Gửi mail
                $order = $this->orderService->find($vnp_TxnRef);
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal);//Gọi hàm gửi email đã định nghĩa

                //Xóa giỏ hàng
                Cart::destroy();
                //Thông báo kết quả
                return redirect('checkout/result')
                    ->with('notification', 'Success! Has paid online. Please check your email.');
            }else{//Nếu ko thành công
                //Xóa đơn hàng đã thêm vào database
                $this->orderService->delete($vnp_TxnRef);
                //Thông báo lỗi
                return redirect('checkout/result')
                    ->with('notification', 'ERROR: Payment failed  canceled.');

            }
        }
    }

    private function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;

        Mail::send('frontend.checkout.email',
            compact('order', 'total', 'subtotal'),
            function ($message) use ($email_to){
                $message->from('ncao515@gmail.com', 'Nguyen Cao');
                $message->to($email_to, $email_to);
                $message->subject('Order Notification');
            }
        );
    }

    public function result()
    {
        $notification = session('notification');

        return view('frontend.checkout.result', compact('notification'));
    }

}
