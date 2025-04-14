<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageUsersController extends Controller

{
    public function users()
    {
        return view('manage-users.users');
    }
    public function role()
    {
        return view('manage-users.role');
    }
    public function index()
    {
        return view('manage-users.index');
    }
}


