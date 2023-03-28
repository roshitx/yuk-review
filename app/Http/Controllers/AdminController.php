<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\ItemNotFoundException;

class AdminController extends Controller
{
    public function index()
    {
       $user = User::where('id', Auth::user()->id)->first();
        return view('auth.admin', $data = [
            'title' => 'Admin',
            'active' => 'admin',
            'user' => $user
        ]);
    }

    public function update(Request $r, User $user)
    {
        $validatedData = $r->validate([
            'name' => 'required|string|min:3|max:255',
            'password' => 'nullable|string|min:8',
            'birth' => 'nullable|date',
        ]);

        $data = $r->except(['id']);
        $data['password'] = Hash::make($r->password);

        try {
            $user = User::all()->where('id', auth()->user()->id)->firstOrFail();
            $user->update($data);
            return redirect()->back()->with('success', 'Success update profile!');
        } catch (ItemNotFoundException $e) {
            // handle exception
        }
    }
}
