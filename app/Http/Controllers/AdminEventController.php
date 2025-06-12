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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'event_date' => 'required|date',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('event_images', 'public'); // ✅ Force 'public' disk
    }

    Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'venue' => $request->venue,
        'event_date' => $request->event_date,
        'image' => $imagePath, // ✅ Save relative path
    ]);

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
