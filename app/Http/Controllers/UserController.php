<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\ItemNotFoundException;

class UserController extends Controller
{
    public function viewAllUser()
    {
        $users = User::all();
        return view('auth.users', compact('users'))
            ->with('title', 'Manage Users')
            ->with('active', 'manage.users');
    }

    public function viewEditUser($id)
    {
        $user = User::find($id);
        return view('auth.edit-user', [
            'title' => 'Edit Movies',
            'active' => 'Edit',
            'user' => $user
        ]);
    }

    public function updateUser(Request $request)
    {
        // validasi input data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required',
            'birth' => 'required|date',
            'role' => 'required'
        ]);


        $id = $request->input('id');
        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->gender = $validatedData['gender'];
        $user->birth = $validatedData['birth'];
        $user->role = $validatedData['role'];
        $user->save();

        try {
            $user->update($validatedData);  
            return redirect()->back()->with('success', "User data successfully updated");
        } catch (ItemNotFoundException $e) {
            return redirect()->back()->with('error', "Unable to update user data with id $id");
        }
    }

    public function deleteUser($id)
    {
        $movie = User::find($id);
        $movie->delete();
        return redirect()->back()->with('success', "User with id $id has been deleted");
    }
}
