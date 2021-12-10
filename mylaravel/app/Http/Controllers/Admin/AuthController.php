<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // sử dụng Auth để xác thực người dùng bằng cách 
class AuthController extends Controller
{
    public function index(){
        return view('Admin.auth.login');
    }

    public function postLogin(Request $request){
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');
        if(Auth::attempt($credentials,$remember)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('auth.login.get')
                    ->withErrors(['Tài khoản hoặc mật khẩu không chính xác']);
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('auth.login.get');
    }
}
//sử dụng Auth::attempt nó sẽ nhận các key/value hệ thống sẽ kiểm tra trong bảng có email nhập vào hay không. Nếu có thì sẽ lấy password của email đó ra so sánh nếu đúng trả về true sai trả về false 
//redirect là đường dẫn trả về