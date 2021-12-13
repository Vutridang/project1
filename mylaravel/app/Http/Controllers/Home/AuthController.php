<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use App\Http\Requests\Home\RegisterRequest;

class AuthController extends Controller
{
    public function login(){
        return view('Home.auth.login');
    }

    public function postlogin(Request $request){
        $input = $request->all();
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');
        if(Auth::attempt($credentials, $remember)){
            toastr()->success('Chào mừng '.Auth::user()->name.' đăng nhập thành công!','Thành công!',['timeOut'=> 4000]);
            return redirect()->route('home');
        }else{
            return redirect()->route('home.login')->withErrors(['Tài khoản hoặc mật khẩu không chính xác']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function register(){
        return view('Home.auth.register');
    }

    public function postRegister(RegisterRequest $request){
        $inputData = $request->all();
        $user = new User();
        $user->name = $inputData['name'];
        $user->email = $inputData['email'];
        $user->number_phone = $inputData['number_phone'];
        $user->date_of_birth = date('Y-m-d',strtotime(str_replace('/','-',$inputData['date_of_birth'])));//đổi định dạng từ '/' sang '-' 
        $user->gender = $inputData['gender'];
        $user->address = $inputData['address'];
        $user->role = 2;
        $user->password = Hash::make($inputData['password']);
        $res = $user->save();
        if($res){
            toastr()->success('Đăng ký thành công!', 'Thành công !', ['timeOut' => 4000]);
            return redirect()->route('home');
        }
        abort(500);

    }
}
