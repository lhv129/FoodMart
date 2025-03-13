<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\SendVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateProfileAdminRequest;
use App\Http\Requests\ChangePasswordAdminRequest;

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
                    toast('Đăng nhập thành công', 'success');
                    return redirect('/');
                } else {
                    toast('Đăng nhập thành công', 'success');
                    return redirect('/admin');
                }
            } else if (Auth::user()->status === 'inactive') {
                toast('Tài khoản của bạn chưa được kích hoạt, vui lòng kiểm tra email', 'error');
                return back()->withInput();
            } else {
                Auth::logout();
                toast('Tài khoản của bạn đã bị khóa, vui lòng liên hệ với nhân viên để được hỗ trợ', 'error');
                return back()->withInput();
            }
        }
        toast('Thông tin đăng nhập không đúng', 'error');
        return back()->withInput();
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

            toast('Đăng nhập thành công', 'success');
            return redirect('/');
        } else {
            return view('404');
        }
    }

    //Admin Profile
    public function profile()
    {
        return view('admin/profile/profile');
    }

    public function handleUpdateProfile(UpdateProfileAdminRequest $request, $id)
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            // Đường dẫn ảnh
            $imageDirectory = 'images/avatars/';
            // Xóa ảnh nếu ảnh cũ
            File::delete($imageDirectory . $user->fileAvatar);
            // Tạo ngẫu nhiên tên ảnh 12 kí tự
            $imageName = Str::random(12) . "." . $file->getClientOriginalExtension();

            $file->move($imageDirectory, $imageName);

            $path_image   = 'http://127.0.0.1:8000/' . ($imageDirectory . $imageName);
        } else {
            $path_image = $user->avatar;
        }
        $user->update([
            'name' => $request->name,
            'avatar' => $path_image,
            'fileAvatar' => $imageName ?? $user->fileAvatar,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'birthday' => $request->birthday,
        ]);
        toast('Cập nhật thành công', 'success');
        return back();
    }

    public function changePassword()
    {
        return view('admin/profile/change-password');
    }

    public function handleChangePassword(ChangePasswordAdminRequest $request, $id)
    {
        // Lấy người dùng hiện tại
        $user = User::findOrFail($id);

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Mật khẩu cũ không đúng.'])->withInput();
        }

        // Kiểm tra mật khẩu mới và xác nhận mật khẩu mới có khớp nhau không
        if ($request->password !== $request->password_confirm) {
            return back()->withErrors(['password_confirm' => 'Mật khẩu xác nhận không khớp.'])->withInput();
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->password);
        $user->save();

        // Thông báo thành công
        toast('Mật khẩu đã được thay đổi', 'success');
        return redirect('admin/ho-so-ca-nhan');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/dang-nhap');
    }
}
