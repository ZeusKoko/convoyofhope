<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Event;


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
                $unreadMessages = Message::where('is_read',false)->get();
                $count = $unreadMessages->count();
                return view('home.staff',compact('unreadMessages','count'));
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

//route method for event
public function events()
{
    $events = Event::orderBy('event_date', 'asc')->get();
    return view('admin.events.index', compact('events'));
}

//edit events
public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('admin.events.edit', compact('event'));
}


//store staff
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


}
