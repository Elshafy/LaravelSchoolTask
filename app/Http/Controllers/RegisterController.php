<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function create()
    {

        return view('teacher.auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        auth('teacher')->login(User::create($attributes));

        return redirect('/home')->with('success', 'Your account has been created.');
    }
}
