<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\ItemNotFoundException;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('auth.admin', $data = [
            'title' => 'Dashboard',
            'active' => 'admin',
            'user' => $user
        ]);
    }

    public function update(Request $req)
    {
        $userId = auth()->user()->id; // Ambil id user saat ini
        $attr = $req->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => ['required',
                        'string', 
                        'email:dns', 
                        'min:3', 
                        Rule::unique('users')->ignore($userId), // Ignore jika user tidak ingin change email
                        ],
            'birth' => 'nullable|date',
            'gender' => 'required'
        ]);

        try {
            $user = User::all()->where('id', auth()->user()->id)->firstOrFail();
            $user->update($attr);

            return back()->with('success', 'Your profile has been updated!');
        } catch (ItemNotFoundException $e) {
            return redirect()->back()->with('error', 'Unable to change your profile information!');
        }
    }
}