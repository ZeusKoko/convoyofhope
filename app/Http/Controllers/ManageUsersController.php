<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUsersController extends Controller


{
    public function users()
    {
        $users = User::where('usertype', 'user')->get(); // Fetch only users, not admins
        return view('manage-users.users', compact('users')); // ✅ Pass users to the view
    }
    public function role()
    {
        return view('manage-users.role');
    }
    public function index()
    {
        return view('manage-users.index');
    }
    public function admin()
    {
        return view('admin.index');
    }

}


