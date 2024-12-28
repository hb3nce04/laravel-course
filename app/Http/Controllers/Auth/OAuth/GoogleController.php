<?php

namespace App\Http\Controllers\Auth\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function index() {
        return Socialite::driver('google')->redirect();
    }

    public function store(Request $request) {
        try {
            $googleUser = Socialite::driver('google')->user();
            $names = explode(' ', $googleUser->getName());

            $user = User::updateOrCreate(['email' => $googleUser->getEmail()], [
                'google_id' => $googleUser->getId(),
                'first_name' => $names[0],
                'last_name' => implode(' ', array_slice($names, 1)),
                'password' => null,
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
            ]);

            if(!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }
            Auth::login($user);

            return redirect()->route('car.index');
        } catch (\Exception $e) {
            return back()->withErrors(['email'=>'Authentication failed. Please try again.']);
        }
    }
}
