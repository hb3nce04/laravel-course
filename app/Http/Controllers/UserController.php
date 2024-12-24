<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(StoreUserRequest $request) {
        $validated = $request->validated();
        User::create($validated);
        return redirect()->back()->with('success', 'Registered successfully!');
    }
}
