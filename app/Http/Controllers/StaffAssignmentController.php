<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\StaffAssignment;
use Carbon\Carbon;

class StaffAssignmentController extends Controller
{


    public function create()
    {
        $events = Event::where('event_date', '>=', Carbon::today())
               ->orderBy('event_date', 'asc')
               ->get();

        $assignments = StaffAssignment::with(['staff', 'event'])->latest()->get();
        $staff = User::where('usertype', 'staff')->get(); 

        return view('admin.staff_assignments.create', compact('staff', 'events', 'assignments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'staff_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'items' => 'required|string',
            'budget' => 'required|numeric',
        ]);

        StaffAssignment::create([
            'staff_id' => $request->staff_id,
            'event_id' => $request->event_id,
            'items' => $request->items,
            'budget' => $request->budget,
        ]);
        

        return redirect()->back()->with('success', 'Staff assignment created successfully.');
    }
}

