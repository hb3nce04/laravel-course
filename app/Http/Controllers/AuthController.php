<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
        $validated = $request->safe();
        $credentials = ['email' => $validated['email'], 'password' => $validated['password']];
        $remember = $validated['remember_me'];
        if (Auth::attempt($credentials, (bool)$remember)) {
            $request->session()->regenerate();
            return redirect()->route('car.index');
        }
        return back()->withErrors(['email'=>'Invalid email or password']);
    }

    public function google() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {
        $googleUser = Socialite::driver('google')->user();
        $names = explode(' ', $googleUser->getName());

        $user = User::where('email', $googleUser->getEmail())->first();
        if ($user) {
            $user->google_id = $googleUser->getId();
            $user->first_name = $names[0];
            $user->last_name = $names[1];
            $user->avatar = $googleUser->getAvatar();
            $user->save();
        } else {
            $user = User::updateOrCreate(['google_id' => $googleUser->id], [
                'google_id' => $googleUser->getId(),
                'first_name' => $names[0],
                'last_name' => $names[1],
                'password' => null,
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
            ]);
        }

        Auth::login($user);

        return redirect()->route('car.index');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
