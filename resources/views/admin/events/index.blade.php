<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen px-4 py-6">

<!-- Navbar -->
<nav class="bg-gray-800 flex items-center justify-between px-4 py-3 rounded shadow mb-6">
    <a href="{{ route('admin.index') }}" class="text-orange-400 hover:text-orange-300 font-semibold">
        ← Back to Dashboard
    </a>
    <span class="text-white text-lg font-bold">Manage Events</span>
</nav>

<!-- Event Form Section -->
<div class="max-w-3xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6 mb-10">
    <h2 class="text-2xl font-bold text-cyan-400 mb-6 text-center">Add New Event</h2>

    <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data" class="grid gap-5">
        @csrf

        <input type="text" name="title" placeholder="Event Title"
               class="w-full p-2 rounded bg-gray-900 border border-gray-600 text-white" required>

        <textarea name="description" placeholder="Event Description" rows="3"
                  class="w-full p-2 rounded bg-gray-900 border border-gray-600 text-white" required></textarea>

        <input type="text" name="venue" placeholder="Event Venue/Region"
               class="w-full p-2 rounded bg-gray-900 border border-gray-600 text-white" required>

        <div>
            <label class="block text-sm text-gray-300 mb-1">Donation Target (Ksh)</label>
            <input type="number" step="0.01" name="target_amount"
                   class="w-full p-2 rounded bg-gray-900 border border-gray-600 text-white">
        </div>

        <div>
            <label class="block text-sm text-gray-300 mb-1">Event Image</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full p-2 rounded bg-gray-900 border border-gray-600 text-white">
        </div>

        <input type="date" name="event_date"
               class="w-full p-2 rounded bg-gray-900 border border-gray-600 text-white" required>

        <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded">
            Add Event
        </button>
    </form>
</div>

<!-- All Events Section -->
<div class="max-w-5xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold text-cyan-400 mb-4 text-center">All Events</h2>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('admin.events.index') }}" class="grid md:grid-cols-3 gap-4 mb-6">
        <input type="text" name="search" placeholder="Search by Title"
               value="{{ request('search') }}"
               class="p-2 rounded bg-gray-900 border border-gray-600 text-white">

        <input type="date" name="from_date" value="{{ request('from_date') }}"
               class="p-2 rounded bg-gray-900 border border-gray-600 text-white">

        <input type="date" name="to_date" value="{{ request('to_date') }}"
               class="p-2 rounded bg-gray-900 border border-gray-600 text-white">

        <div class="md:col-span-3">
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded">
                Filter Events
            </button>
        </div>
    </form>

    <!-- Event List -->
    <ul class="space-y-4">
        @foreach (
            $events->filter(function ($event) {
                $isPast = \Carbon\Carbon::parse($event->event_date)->isPast();
                return !$isPast;
            })->sortBy('event_date')->merge(
                $events->filter(fn($e) => \Carbon\Carbon::parse($e->event_date)->isPast())->sortBy('event_date')
            ) as $event
        )
            <li class="p-4 rounded-lg shadow border-l-4 
                {{ \Carbon\Carbon::parse($event->event_date)->isPast() ? 'bg-gray-700 border-gray-500 opacity-70' : 'bg-gray-900 border-orange-400' }}">
                <h3 class="font-bold text-lg text-orange-300">{{ $event->title }}</h3>
                <p class="text-sm text-gray-400 italic">{{ $event->venue }}</p>
                <p class="mt-2">{{ $event->description }}</p>
                <p class="text-sm mt-1 text-gray-300">
                    {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}
                </p>

                @if (!\Carbon\Carbon::parse($event->event_date)->isPast())
                    <div class="mt-4 flex gap-3">
                        <a href="{{ route('admin.events.edit', $event->id) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">Edit</a>

                        <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
    
</div>
</body>
</html>
