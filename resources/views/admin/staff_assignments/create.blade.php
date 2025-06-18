<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Staff to Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen px-6 py-8">

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('admin.index') }}" class="inline-flex items-center gap-2 text-orange-400 hover:text-orange-300">
            <i class="bi bi-arrow-left-circle-fill"></i> Back to Admin Dashboard
        </a>
    </div>

    <!-- Assignment Form -->
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 mb-8">
        <h2 class="text-2xl font-bold text-orange-400 mb-6">Assign Staff to Event</h2>

        @if(session('success'))
            <div class="bg-green-700 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('staff.assignments.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            <div>
                <label class="block text-sm text-gray-300 mb-1">Select Staff</label>
                <select name="staff_id" class="w-full p-2 rounded bg-gray-900 text-white border border-gray-600" required>
                    <option value="">-- Choose Staff --</option>
                    @foreach($staff as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1">Select Event</label>
                <select name="event_id" class="w-full p-2 rounded bg-gray-900 text-white border border-gray-600" required>
                    <option value="">-- Choose Event --</option>
                    @foreach($events as $e)
                        <option value="{{ $e->id }}">{{ $e->title }} - {{ $e->venue }}</option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm text-gray-300 mb-1">Items to Distribute</label>
                <textarea name="items" rows="3" class="w-full p-2 rounded bg-gray-900 text-white border border-gray-600" placeholder="e.g. Food, Water, Clothes" required></textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm text-gray-300 mb-1">Total Budget (KES)</label>
                <input type="number" name="budget" step="0.01" class="w-full p-2 rounded bg-gray-900 text-white border border-gray-600" placeholder="Enter amount in KES" required>
            </div>

            <div class="md:col-span-2">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded font-semibold">
                    Assign Staff
                </button>
            </div>
        </form>
    </div>

    <!-- Existing Assignments Table -->
    @if($assignments->count())
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold text-cyan-300 mb-4">Existing Staff Assignments</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-700 text-yellow-300">
                        <tr>
                            <th class="p-3">#</th>
                            <th class="p-3">Staff</th>
                            <th class="p-3">Event</th>
                            <th class="p-3">Venue</th>
                            <th class="p-3">Items</th>
                            <th class="p-3">Budget (KES)</th>
                            <th class="p-3">Assigned On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assignments as $index => $assignment)
                            <tr class="border-b border-gray-700 hover:bg-gray-700/40">
                                <td class="p-3">{{ $index + 1 }}</td>
                                <td class="p-3">{{ $assignment->staff->name }}</td>
                                <td class="p-3">{{ $assignment->event->title }}</td>
                                <td class="p-3">{{ $assignment->event->venue }}</td>
                                <td class="p-3">{{ $assignment->items }}</td>
                                <td class="p-3 text-green-400">{{ number_format($assignment->budget, 2) }}</td>
                                <td class="p-3 text-gray-300">{{ $assignment->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="bg-yellow-200 text-yellow-800 text-center py-4 px-6 rounded shadow mt-6">
            No staff assignments yet.
        </div>
    @endif

</body>
</html>
