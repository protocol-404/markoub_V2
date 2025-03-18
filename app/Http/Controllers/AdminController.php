<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

public function getAllUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

     public function modifyUserRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,societe,user',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Role updated successfully.');
    }
}
