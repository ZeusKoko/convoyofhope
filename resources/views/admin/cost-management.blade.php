<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<a href="{{ route('admin.index') }}" class="btn btn-outline-warning d-inline-flex align-items-center gap-2 mb-4">
    <i class="bi bi-arrow-left-circle-fill"></i> Back to Dashboard
</a>

<div class="container py-5 bg-light rounded shadow">
    <h2 class="mb-4 text-orange fw-bold display-6">
        <i class="bi bi-bar-chart-fill text-warning me-2"></i> Cost Management Overview
    </h2>

    <form method="GET" class="row g-3 align-items-end mb-4">
        <div class="col-md-3">
            <label class="form-label text-muted">Month</label>
            <select name="month" class="form-select">
                <option value="">-- Month --</option>
                @foreach(range(1, 12) as $m)
                    <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label text-muted">Year</label>
            <select name="year" class="form-select">
                <option value="">-- Year --</option>
                @foreach(range(date('Y'), 2020) as $y)
                    <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-warning w-100">Filter</button>
        </div>
    </form>

    <div class="row text-white mb-4">
        <div class="col-md-4 mb-3">
            <div class="bg-success p-4 rounded shadow">
                <small>Total Donations</small>
                <h3 class="fw-bold">Ksh {{ number_format($totalDonated, 2) }}</h3>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="bg-danger p-4 rounded shadow">
                <small>Total Budget Used</small>
                <h3 class="fw-bold">Ksh {{ number_format($totalBudgetUsed, 2) }}</h3>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="bg-warning p-4 rounded shadow text-dark">
                <small>Available Balance</small>
                <h3 class="fw-bold">Ksh {{ number_format($totalAvailable, 2) }}</h3>
            </div>
        </div>
    </div>

    <div class="rounded p-3 mb-5 shadow" style="background-color: #e9ecef;">
        <canvas id="costChart" height="120"></canvas>
    </div>

    <div class="table-responsive rounded shadow" style="background-color: #e9ecef;">
        <table class="table table-bordered table-hover mb-0">
            <thead class="table-warning">
                <tr>
                    <th>Event</th>
                    <th>Donated</th>
                    <th>Budget Used</th>
                    <th>Available</th>
                    <th>Target</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventReports as $report)
                    <tr>
                        <td>{{ $report['title'] }}</td>
                        <td class="text-success">Ksh {{ number_format($report['donated'], 2) }}</td>
                        <td class="text-danger">Ksh {{ number_format($report['budget_used'], 2) }}</td>
                        <td class="text-warning">Ksh {{ number_format($report['available'], 2) }}</td>
                        <td>{{ $report['target'] > 0 ? 'Ksh ' . number_format($report['target'], 2) : 'No Target' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Chart.js -->
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
                    backgroundColor: 'rgba(25, 135, 84, 0.7)' // Bootstrap green
                },
                {
                    label: 'Budget Used',
                    data: {!! json_encode($eventReports->pluck('budget_used')) !!},
                    backgroundColor: 'rgba(220, 53, 69, 0.7)' // Bootstrap red
                },
                {
                    label: 'Target',
                    data: {!! json_encode($eventReports->pluck('target')) !!},
                    backgroundColor: 'rgba(255, 193, 7, 0.7)' // Bootstrap yellow
                },
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { labels: { color: '#000' } }
            },
            scales: {
                x: { ticks: { color: '#000' }, grid: { color: '#ccc' }},
                y: { ticks: { color: '#000' }, grid: { color: '#ccc' }}
            }
        }
    });
</script>
