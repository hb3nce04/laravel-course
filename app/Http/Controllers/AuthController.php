<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup() {
        return view('auth.signup');
    }

    public function login() {
        return view('auth.login');
    }

    public function resetPassword() {
        return view('auth.reset-password');
    }

    public function local(AuthUserRequest $request) {
        $credetials = $request->validated();
        if (Auth::attempt($credetials)) {
            $request->session()->regenerate();
            return redirect()->route('car.index');
        }
        return back()->withErrors(['email'=>'Invalid email or password']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
