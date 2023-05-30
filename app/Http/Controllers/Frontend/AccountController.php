<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $userService;
    private $orderService;

    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService)
    {
        $this->userService = $userService ;
        $this->orderService = $orderService ;
    }

    public function login()
    {
        return view('frontend.account.login');
    }

    public function checkLogin(Request  $request)
    {
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password,
            // 'level'=>Constant::user_level_client,//Tài khoản cấp độ khách hàng
            // 'level'=>Constant::user_level_admin, //Tài khoản cấp độ admin
        ];

        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)){
            //return redirect('');//trang chủ
            return redirect()->intended('');//Mặc định trang chủ
        }else{
            return back()
                ->with('notification', 'ERROR: Email or password is wrong');
        }
    }

    public function logout()
    {
        Auth::logout();

        return back();
    }

    public function register()
    {
        return view('frontend.account.register');
    }

    public function postRegister(Request  $request)
    {
        if($request->password!=$request->password_confirmation){
            return back()
                ->with('notification', 'ERROR, Confirm password does not match');
        }
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'level'=>Constant::user_level_client,//Đăng kí tài khoản khách hàng
        ];
        $this->userService->create($data);
        return redirect('account/login')
            ->with('notification', 'Register Success! Please login.');
    }

    public function myOrderIndex()
    {
        $orders = $this->orderService->getOrderByUserId(Auth::id());

        return view('frontend.account.my-order.index', compact('orders'));
    }

    public function myOrderShow($id)
    {
        $order = $this->orderService->find($id);

        return view('frontend.account.my-order.show', compact('order'));
    }
}
