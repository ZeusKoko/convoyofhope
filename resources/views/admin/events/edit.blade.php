<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen px-4 py-6">
<div class="max-w-2xl mx-auto bg-gray-800 rounded-lg shadow-lg p-6 mt-10 text-white">
  <h2 class="text-2xl font-bold text-cyan-400 mb-6 text-center">Edit Event</h2>

  <form method="POST" action="{{ route('admin.events.update', $event->id) }}" class="space-y-5">
    @csrf
    @method('PUT')

    <input type="text" name="title"
           value="{{ old('title', $event->title) }}"
           required
           placeholder="Event Title"
           class="w-full p-3 rounded bg-gray-900 border border-gray-600 text-white">

    <textarea name="description" rows="4"
              required
              placeholder="Event Description"
              class="w-full p-3 rounded bg-gray-900 border border-gray-600 text-white">{{ old('description', $event->description) }}</textarea>

    <input type="text" name="venue"
           value="{{ old('venue', $event->venue) }}"
           placeholder="Event Venue / Region"
           required
           class="w-full p-3 rounded bg-gray-900 border border-gray-600 text-white">

    <input type="date" name="event_date"
           value="{{ old('event_date', $event->event_date) }}"
           required
           class="w-full p-3 rounded bg-gray-900 border border-gray-600 text-white">

    <button type="submit"
            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded">
      Update Event
    </button>
  </form>

  <div class="mt-6 text-center">
    <a href="{{ route('admin.events.index') }}"
       class="inline-block bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded font-semibold">
      ← Back to Events
    </a>
  </div>
</div>
</body>
</html>
