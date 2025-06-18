<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <a href="{{ route('admin.index') }}" class="inline-flex items-center gap-2 text-orange-400 hover:text-orange-300 mb-6">
        <i class="bi bi-arrow-left-circle-fill"></i> Back to Dashboard
    </a>
<div class="p-6 bg-gray-900 text-white min-h-screen">
    <h2 class="text-3xl font-bold text-orange-400 mb-8"> System Report Overview</h2>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-gray-800 p-5 rounded-lg shadow hover:shadow-lg transition-all duration-300">
            <p class="text-sm text-gray-400"> Total Users</p>
            <h3 class="text-2xl font-bold text-green-400 mt-2">{{ $totalUsers }}</h3>
        </div>
        <div class="bg-gray-800 p-5 rounded-lg shadow hover:shadow-lg transition-all duration-300">
            <p class="text-sm text-gray-400"> New Users This Month</p>
            <h3 class="text-2xl font-bold text-yellow-300 mt-2">{{ $newUsers }}</h3>
        </div>
        <div class="bg-gray-800 p-5 rounded-lg shadow hover:shadow-lg transition-all duration-300">
            <p class="text-sm text-gray-400"> Total Staff Assigned</p>
            <h3 class="text-2xl font-bold text-orange-400 mt-2">{{ $totalStaff }}</h3>
        </div>
        <div class="bg-gray-800 p-5 rounded-lg shadow hover:shadow-lg transition-all duration-300">
            <p class="text-sm text-gray-400"> Total Donations</p>
            <h3 class="text-2xl font-bold text-green-400 mt-2">KES {{ number_format($totalDonations, 2) }}</h3>
        </div>
    </div>

    {{-- Recent Activities --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <div class="bg-gray-800 p-5 rounded-lg shadow">
            <h4 class="text-xl font-semibold text-orange-300 mb-4"> Recent Users</h4>
            <ul class="divide-y divide-gray-700">
                @forelse($recentUsers as $user)
                    <li class="py-2 flex justify-between">
                        <span>{{ $user->name }}</span>
                        <span class="text-sm text-gray-400">{{ $user->email }}</span>
                    </li>
                @empty
                    <li class="py-2 text-gray-400">No recent users.</li>
                @endforelse
            </ul>
        </div>

        <div class="bg-gray-800 p-5 rounded-lg shadow">
            <h4 class="text-xl font-semibold text-orange-300 mb-4">💸 Recent Donations</h4>
            <ul class="divide-y divide-gray-700">
                @forelse($recentDonations as $donation)
                    <li class="py-2">
                        {{ optional($donation->user)->name ?? 'Anonymous' }} donated 
                        <span class="text-green-400">KES {{ number_format($donation->amount, 2) }}</span>
                        <span class="text-sm text-gray-400">for {{ optional($donation->event)->title ?? 'Unknown Event' }}</span>
                    </li>
                @empty
                    <li class="py-2 text-gray-400">No donations yet.</li>
                @endforelse
            </ul>
        </div>
    </div>

    {{-- Donations vs Target Table --}}
    <div class="bg-gray-800 p-5 rounded-lg shadow">
        <h4 class="text-xl font-semibold text-orange-300 mb-4">Event Donations vs Targets</h4>
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-sm">
                <thead class="bg-gray-700 text-left text-gray-300">
                    <tr>
                        <th class="p-3">Event</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Target</th>
                        <th class="p-3">Donated</th>
                    </tr>
                </thead>
                <tbody class="text-white">
                    @forelse($events as $event)
                        <tr class="border-b border-gray-700 hover:bg-gray-700 transition-all duration-200">
                            <td class="p-3">{{ $event['title'] }}</td>
                            <td class="p-3 text-gray-400">{{ $event['date'] }}</td>
                            <td class="p-3 text-yellow-300">KES {{ number_format($event['target'], 2) }}</td>
                            <td class="p-3 text-green-400">KES {{ number_format($event['donated'], 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-400">No event data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
