<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype= Auth()->user()->usertype;
            if($usertype == 'user')
            {
                return view('home.user');
            }
            else if($usertype == 'admin')
            {
                return view('admin.index');
            }
            else if($usertype == 'staff')
            {
                return view('home.staff');
            }
            else
            {
                return redirect()->back();
            }
        }
    }
    public function manageUsers()
    {
        $users = \App\Models\User::all(); 
        return view('manage-users/index', compact('users'));
    }
public function createUser()
{
    return view('admin.register_user'); 
}

public function storeUser(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'user',
    ]);

    return redirect()->back()->with('success', 'User registered.');
}

public function createStaff()
{
    return view('admin.register_staff'); // another form
}

public function storeStaff(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'staff',
    ]);

    return redirect()->back()->with('success', 'Staff registered.');
}

//controller reg

}
