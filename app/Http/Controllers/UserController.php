<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
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

    // Import & Export User
    public function exportUser() 
    {
        return Excel::download(new UsersExport, 'user.xlsx');
    }

    public function importUser(Request $request)
    {
        try {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->move('DataUser', $fileName);
            Excel::import(new UsersImport, public_path('/DataUser/'.$fileName));

            return redirect()->route('user.index')->with('success', 'Users data imported successfully');
        } catch (ItemNotFoundException $e) {
            return redirect()->route('user.index')->with('error', 'Failed to import user data');
        }
    }

    // Chart Gender
    public function genderStats()
    {
        $maleCount = User::where('gender', 'Male')->count();
        $femaleCount = User::where('gender', 'Female')->count();
        $otherCount = User::where('gender', 'Other')->count();

        $data = [
            'male' => $maleCount,
            'female' => $femaleCount,
            'other' => $otherCount,
        ];

        return response()->json($data);
    }


}
