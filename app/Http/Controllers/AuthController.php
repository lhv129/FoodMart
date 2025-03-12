<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\SendVerifyEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {
            if (Auth::user()->status === 'active') {
                if (Auth::user()->role_id === 3) {
                    toast('Đăng nhập thành công','success');
                    return redirect('/');
                } else {
                    toast('Đăng nhập thành công','success');
                    return redirect('/admin');
                }
            } else if (Auth::user()->status === 'inactive') {
                return back()->withErrors(['message' => "Tài khoản của bạn chưa được kích hoạt, vui lòng kiểm tra email"])->withInput();
            } else {
                Auth::logout();
                return back()->withErrors(['message' => "403 (Forbidden) - tài khoản đã bị khóa"])->withInput();
            }
        }
        return back()->withErrors(['email' => "Thông tin đăng nhập không chính xác"])->withInput();
    }

    public function register()
    {
        return view('register');
    }

    public function handleRegister(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'avatar' => 'http://127.0.0.1:8000/images/avatars/default.jpg',
            'verification_token' => Str::random(40),
            'role_id' => 3,
        ]);
        Mail::to($request->email)->send(new SendVerifyEmail($user));
        return redirect('/dang-nhap')->with('message', 'Vui lòng kiểm tra email để kích hoạt tài khoản');
    }

    public function verifyEmail($token)
    {
        $user = User::where('verification_token', $token)->first();
        if ($user) {
            $user->email_verified_at = now();
            $user->status = 'active';
            $user->verification_token = null;
            $user->save();

            // Tự động đăng nhập người dùng sau khi đăng ký
            Auth::login($user);

            toast('Đăng nhập thành công','success');
            return redirect('/');
        } else {
            return view('404');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/dang-nhap');
    }
}
