<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id())  
        {
            $usertype = Auth::user()->usertype; 

            if ($usertype == 'home')
            {
                return view('home.homepage');
            }
            elseif ($usertype == 'admin')
            {
                return view('admin.adminhome');
            }
            else
            {
                return redirect()->back();
            }
        }

        return redirect()->route('login'); // Redirect if not logged in
    }

    public function homepage()
    {
        return view('home.homepage');
    }
    
}
