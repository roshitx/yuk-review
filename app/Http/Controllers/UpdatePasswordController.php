<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ItemNotFoundException;
use Illuminate\Validation\ValidationException;

class UpdatePasswordController extends Controller
{
    public function index()
    {
        return view('auth.password.edit', [
            'active' => 'changepw',
            'title' => 'Dashboard'
        ]);
    }

    public function update(Request $req)
    {
        // Validate field
        $req->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:5', 'confirmed']
        ]);

        // Jika current password !== password di database

        try {
            if (Hash::check($req->current_password, auth()->user()->password)) {
    
                $user = User::all()->where('id', auth()->user()->id)->firstOrFail();
                $user->update(['password' => Hash::make($req->password)]);
                return back()->with('success', 'Your password has been changes!');
            }
    
            throw ValidationException::withMessages([
                'current_password' => "Your current password doesn't match with our record"
            ]);
        } catch (ItemNotFoundException $e) {

        }
    }
}
