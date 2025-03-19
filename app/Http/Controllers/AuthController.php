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
                $name = Auth::user()->name;
                if (Auth::user()->role_id === 3) {
                    $name = Auth::user()->name;
                    toast("Đăng nhập thành công, xin chào $name", 'success');
                    return redirect('/');
                } else {
                    toast("Đăng nhập thành công, xin chào $name", 'success');
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
            $imageDirectory = 'images/avatars/';

            // Xóa ảnh cũ nếu có
            if ($user->fileAvatar) {
                $oldImagePath = public_path($imageDirectory . $user->fileAvatar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Tạo tên ảnh ngẫu nhiên
            $imageName = Str::random(12) . '.' . $file->getClientOriginalExtension();
            $imagePath = public_path($imageDirectory . $imageName);

            // Sử dụng GD Library để xử lý ảnh
            $sourceImage = imagecreatefromstring(file_get_contents($file->getRealPath()));
            $sourceWidth = imagesx($sourceImage);
            $sourceHeight = imagesy($sourceImage);

            // Xác định kích thước crop
            $cropSize = 500;
            $cropX = 0;
            $cropY = 0;

            if ($sourceWidth > $sourceHeight) {
                $cropX = ($sourceWidth - $sourceHeight) / 2;
                $sourceWidth = $sourceHeight;
            } else {
                $cropY = ($sourceHeight - $sourceWidth) / 2;
                $sourceHeight = $sourceWidth;
            }

            // Tạo ảnh crop
            $croppedImage = imagecreatetruecolor($cropSize, $cropSize);
            imagecopyresampled($croppedImage, $sourceImage, 0, 0, $cropX, $cropY, $cropSize, $cropSize, $sourceWidth, $sourceHeight);

            // Lưu ảnh đã crop
            imagejpeg($croppedImage, $imagePath, 80); // Chất lượng 80

            // Giải phóng bộ nhớ
            imagedestroy($sourceImage);
            imagedestroy($croppedImage);

            $path_image = asset($imageDirectory . $imageName);
        } else {
            $path_image = $user->avatar;
            $imageName = $user->fileAvatar; // Giữ nguyên tên ảnh cũ
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
        return back();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/dang-nhap');
    }
}
