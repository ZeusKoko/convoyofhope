<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'venue' => 'required|string',
            'event_date' => 'required|date',
        ]);

        Event::create($request->only('title', 'description','venue', 'event_date'));

        return redirect()->route('admin.events.index')->with('success', 'Event added!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'venue' => 'required|string',
            'event_date' => 'required|date',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->only('title', 'description','venue', 'event_date'));

        return redirect()->route('admin.events.index')->with('success', 'Event updated!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted!');
    }
}
