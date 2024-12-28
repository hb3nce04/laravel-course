<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(AuthUserRequest $request) {
        $validated = $request->safe();
        $credentials = ['email' => $validated['email'], 'password' => $validated['password']];
        $remember = $validated['remember_me'];
        if (Auth::attempt($credentials, (bool)$remember)) {
            $request->session()->regenerate();
            return redirect()->route('car.index');
        }
        return back()->withErrors(['email'=>'Invalid email or password']);
    }

    public function destroy(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
