<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $setting = Setting::first();

        return view('auth.login', compact('setting'));
    }
}
