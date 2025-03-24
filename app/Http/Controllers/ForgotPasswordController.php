<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendForgetPasswordEmail;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\HandleForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('forget-password/index');
    }

    public function handleForgetPassword(ForgotPasswordRequest $request)
    {
        $token = Str::random(5) . rand(1, 3);
        $expiresAt = Carbon::now()->addMinutes(10);

        $user = PasswordReset::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
            'expires_at' => $expiresAt,
        ]);

        session(['forgot_password_email' => $request->email]);

        Mail::to($request->email)->send(new SendForgetPasswordEmail($user));
        toast('Vui lòng kiểm tra email để khôi phục tài khoản', 'success');
        return redirect('/quen-mat-khau/xac-nhan');
    }

    public function checkToken()
    {
        return view('forget-password/confirmToken');
    }

    public function handleConfirmToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ], [
            'required' => 'Vui lòng nhập mã khôi phục'
        ]);
        $email = session('forgot_password_email');
        // Khi xác thực token:
        $passwordReset = PasswordReset::where('token', $request->token)
            ->where('email', $email)
            ->first();

        if ($passwordReset) {
            if (now() > $passwordReset->expires_at) {
                // Token đã hết hạn, xóa token
                PasswordReset::where('token', $request->token)->delete();
                toast('Mã xác nhận đã hết hạn', 'error');
                return redirect('/quen-mat-khau')->withInput();
            } else {
                // Token hợp lệ và chưa hết hạn
                $passwordReset->delete();
                return redirect('/doi-mat-khau');
            }
        } else {
            // Token không hợp lệ
            toast('Mã xác nhận không hợp lệ.', 'error');
            return redirect('/quen-mat-khau/xac-nhan')->withInput();
        }
    }

    public function changePassword()
    {
        return view('forget-password/changePassword');
    }

    public function handleChangePassword(HandleForgotPasswordRequest $request)
    {
        $email = session('forgot_password_email');
        // Lấy người dùng hiện tại
        $user = User::where('email',$email)->first();

        // Kiểm tra mật khẩu mới và xác nhận mật khẩu mới có khớp nhau không
        if ($request->password !== $request->password_confirm) {
            return back()->withErrors(['password_confirm' => 'Mật khẩu xác nhận không khớp.'])->withInput();
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->password);
        $user->save();

        session()->forget('forgot_password_email');

        // Thông báo thành công
        $user = User::where('email', $email)->first();
        Auth::login($user);
        toast('Mật khẩu đã được thay đổi thành công.', 'success');
        return redirect('/');
    }
}
