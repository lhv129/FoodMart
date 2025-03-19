<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        return view('client/profile/index');
    }

    public function changePassword(){
        return view('client/profile/change-password');
    }
}
