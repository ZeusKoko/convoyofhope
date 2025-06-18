<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cost Management Overview</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen px-6 py-8">

    <a href="{{ route('admin.index') }}" class="inline-flex items-center gap-2 text-orange-400 hover:text-orange-300 mb-6">
        <i class="bi bi-arrow-left-circle-fill"></i> Back to Dashboard
    </a>

    <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl md:text-3xl font-bold text-orange-400 mb-6 flex items-center gap-2">
            <i class="bi bi-bar-chart-fill text-yellow-300"></i> Cost Management Overview
        </h2>

        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-sm text-gray-300 mb-1">Month</label>
                <select name="month" class="w-full p-2 rounded bg-gray-900 text-white border border-gray-600">
                    <option value="">-- Month --</option>
                    @foreach(range(1, 12) as $m)
                        <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm text-gray-300 mb-1">Year</label>
                <select name="year" class="w-full p-2 rounded bg-gray-900 text-white border border-gray-600">
                    <option value="">-- Year --</option>
                    @foreach(range(date('Y'), 2020) as $y)
                        <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end">
                <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded">
                    Filter
                </button>
            </div>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-green-700 p-5 rounded-lg shadow">
                <p class="text-sm text-green-100">Total Donations</p>
                <h3 class="text-2xl font-bold">Ksh {{ number_format($totalDonated, 2) }}</h3>
            </div>
            <div class="bg-red-700 p-5 rounded-lg shadow">
                <p class="text-sm text-red-100">Total Budget Used</p>
                <h3 class="text-2xl font-bold">Ksh {{ number_format($totalBudgetUsed, 2) }}</h3>
            </div>
            <div class="bg-yellow-500 text-gray-900 p-5 rounded-lg shadow">
                <p class="text-sm">Available Balance</p>
                <h3 class="text-2xl font-bold">Ksh {{ number_format($totalAvailable, 2) }}</h3>
            </div>
        </div>

        <div class="bg-gray-700 p-4 rounded mb-6 shadow">
            <canvas id="costChart" height="100"></canvas>
        </div>

        <div class="overflow-x-auto bg-gray-800 rounded-lg shadow">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-700 text-orange-300">
                    <tr>
                        <th class="p-3">Event</th>
                        <th class="p-3">Donated</th>
                        <th class="p-3">Budget Used</th>
                        <th class="p-3">Available</th>
                        <th class="p-3">Target</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventReports as $report)
                        <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                            <td class="p-3">{{ $report['title'] }}</td>
                            <td class="p-3 text-green-400">Ksh {{ number_format($report['donated'], 2) }}</td>
                            <td class="p-3 text-red-400">Ksh {{ number_format($report['budget_used'], 2) }}</td>
                            <td class="p-3 text-yellow-300">Ksh {{ number_format($report['available'], 2) }}</td>
                            <td class="p-3">
                                @if($report['target'] > 0)
                                    <span class="text-white">Ksh {{ number_format($report['target'], 2) }}</span>
                                @else
                                    <span class="text-gray-400">No Target</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('costChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($eventReports->pluck('title')) !!},
                datasets: [
                    {
                        label: 'Donated',
                        data: {!! json_encode($eventReports->pluck('donated')) !!},
                        backgroundColor: 'rgba(34,197,94,0.7)' // Tailwind green
                    },
                    {
                        label: 'Budget Used',
                        data: {!! json_encode($eventReports->pluck('budget_used')) !!},
                        backgroundColor: 'rgba(239,68,68,0.7)' // Tailwind red
                    },
                    {
                        label: 'Target',
                        data: {!! json_encode($eventReports->pluck('target')) !!},
                        backgroundColor: 'rgba(234,179,8,0.7)' // Tailwind yellow
                    },
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { labels: { color: '#fff' } }
                },
                scales: {
                    x: { ticks: { color: '#fff' }, grid: { color: '#444' }},
                    y: { ticks: { color: '#fff' }, grid: { color: '#444' }}
                }
            }
        });
    </script>

</body>
</html>
