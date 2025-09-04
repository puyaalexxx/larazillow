<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserAccountController extends Controller
{
    public function create()
    {
        return Inertia::render('UserAccount/Create');
    }

    public function store(Request $request)
    {
        User::create($request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ]));

        return redirect()->intended('/listing.index')->with('success', 'Account created successfully. You can now log in.');
    }
}
