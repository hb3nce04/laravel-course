<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index() {
        return view('auth.signup');
    }

    public function store(StoreUserRequest $request) {
        $validated = $request->validated();
        $user = User::create($validated);
        event(new Registered($user));
        return redirect()->back()->with('success', 'Registered successfully!');
    }
}
