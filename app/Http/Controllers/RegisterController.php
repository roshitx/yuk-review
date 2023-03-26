<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $req)
    {
        $validatedData = $req->validate([
            'email' => 'required|email:dns|unique:users',
            'name' => 'required|max:255',
            'password' => 'required|confirmed|min:5|max:255',
            'gender' => 'required|in:male,female,other'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
