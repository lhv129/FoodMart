<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SocialAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginUrl()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginCallback()
    {
        $googleUser = Socialite::driver('google')->with(['prompt' => 'select_account'])->user();

        $existingUser = User::withTrashed()
        ->where('email', $googleUser->getEmail())
        ->first();

        if ($existingUser) {
            Auth::login($existingUser);
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
            } else {
                Auth::logout();
                toast('Tài khoản của bạn đã bị khóa, vui lòng liên hệ với nhân viên để được hỗ trợ', 'error');
                return redirect('/dang-nhap')->withInput();
            }
        } else {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
                'email_verified_at' => now(),
                'status' => 'active',
                'role_id' => 3
            ]);

            SocialAccount::create([
                'user_id' => $user->id,
                'social_id' => $googleUser->getId(),
                'social_provider' => 'google',
                'social_name' =>  $googleUser->getName(),
            ]);

            Auth::login($user);
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
            }
        }
    }
}
