<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function getLogin()
    {
        return view('admin.login');
    }
    public function index()
    {
        $totalOrder = \DB::table('orders')->select('id')->count();
        $totalProduct = \DB::table('order_details')->sum('qty');
        $totalRevenue = \DB::table('order_details')->sum('total');
        $totalUserRegister = \DB::table('users')->select('id')->count();
        $viewData = [
            'totalOrder'=>$totalOrder,
            'totalProduct'=>$totalProduct,
            'totalRevenue'=>$totalRevenue,
            'totalUserRegister'=>$totalUserRegister
        ];
        return view('admin.index', $viewData);
        
    }
    public function postLogin(Request  $request)
    {
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password,
            'level'=>[Constant::user_level_host, Constant::user_level_admin],//Tài khoản cấp độ host hoặc admin
        ];

        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended('admin/index');//Mặc định trang chủ
        }else{
            return back()
                ->with('notification', 'ERROR: Email or password is wrong');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
