<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function resetPassword() {
        return view('auth.reset-password');
    }
}
