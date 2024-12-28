<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\StorePasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function index()
    {
        return view('auth.reset-password');
    }

    public function store (StorePasswordRequest $request) {
        $validated = $request->safe();
        $status = Password::sendResetLink($validated->only('email'));
        return $status === Password::RESET_LINK_SENT ? back()->with('success', __($status)) : back()->withErrors(['email' => __($status)]);
    }

    public function edit(string $token) {
        return view('auth.password', compact('token'));
    }

    public function update(UpdatePasswordRequest $request) {
        $validated = $request->safe();
        $status = Password::reset($request->only('email', 'password', 'password2', 'token'),function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
        });
        return $status === Password::PASSWORD_RESET ? redirect()->route('login')->with('success', __($status)) : back()->withErrors(['email' => __($status)]);
    }
}
