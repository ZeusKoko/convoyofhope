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
                return view('dashboard');
            }
            else if($usertype == 'admin')
            {
                return view('admin.index');
            }
            else
            {
                return redirect()->back();
            }
        }
    }
    public function manageUsers()
    {
        $users = \App\Models\User::all(); // Or paginate, if needed
        return view('manage-users/index', compact('users'));
    }

}
