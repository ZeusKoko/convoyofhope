<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Event;
use App\Models\StaffAssignment;

use Illuminate\Support\Carbon;




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
    $user = Auth()->user(); 
    $unreadMessages = Message::where('is_read', false)->get();
    $count = $unreadMessages->count();

    

    $assignments = StaffAssignment::with('event')
    ->where('staff_id', $user->id)
    ->whereHas('event', function ($query) {
        $query->where('event_date', '>=', Carbon::today());
    })
    ->get();

    $pastAssignments = StaffAssignment::with(['event', 'staff'])
    ->whereHas('event')
    ->get();
     // Fetch all upcoming assignments (where event_date is today or future)
    $upcomingAssignments = StaffAssignment::with('event', 'staff')
        ->whereHas('event', function ($query) {
            $query->whereDate('event_date', '>=', Carbon::today());
        })
        ->get();
    $upcomingCount = $upcomingAssignments->count();
    $allAssignments = StaffAssignment::with('event')->get();

    $totalAssignments = $allAssignments->count();
    $upcomingCount = $allAssignments->filter(fn($a) => $a->event->event_date >= Carbon::today())->count();
    $pastCount = $allAssignments->filter(fn($a) => $a->event->event_date < Carbon::today())->count();
    //banner modal
    $upcomingEvents = Event::whereDate('event_date', '>=', Carbon::today())->orderBy('event_date')->get();


    $monthlyLabels = [];
    $monthlyCounts = [];

for ($i = 1; $i <= 12; $i++) {
    $monthName = date('M', mktime(0, 0, 0, $i, 10));
    $count = $allAssignments->filter(function ($a) use ($i) {
        return date('m', strtotime($a->event->event_date)) == $i;
    })->count();

    $monthlyLabels[] = $monthName;
    $monthlyCounts[] = $count;
}



return view ('home.staff', compact('unreadMessages', 'count', 'assignments', 'pastAssignments','upcomingCount','upcomingAssignments','totalAssignments', 'upcomingCount', 'pastCount', 'allAssignments', 'monthlyLabels', 'monthlyCounts','upcomingEvents'));
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
