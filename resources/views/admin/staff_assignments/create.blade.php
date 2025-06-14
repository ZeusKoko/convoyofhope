<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Staff to Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">&larr; Back to Admin Dashboard</a>
    </div>

    <!-- Assignment Form -->
    <div class="card shadow mb-5">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Assign Staff to Event</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('staff.assignments.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="staff_id" class="form-label">Select Staff</label>
                    <select class="form-select" name="staff_id" required>
                        <option value="">-- Choose Staff --</option>
                        @foreach($staff as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="event_id" class="form-label">Select Event</label>
                    <select class="form-select" name="event_id" required>
                        <option value="">-- Choose Event --</option>
                        @foreach($events as $e)
                            <option value="{{ $e->id }}">{{ $e->title }} - {{ $e->venue }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="items" class="form-label">Items to Distribute</label>
                    <textarea class="form-control" name="items" rows="3" placeholder="e.g. Food, Water, Clothes" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="budget" class="form-label">Total Budget (KES)</label>
                    <input type="number" class="form-control" name="budget" step="0.01" placeholder="Enter amount in KES" required>
                </div>

                <button type="submit" class="btn btn-success">Assign Staff</button>
            </form>
        </div>
    </div>

    <!-- Existing Assignments Table -->
    @if($assignments->count())
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Existing Staff Assignments</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Staff</th>
                            <th>Event</th>
                            <th>Venue</th>
                            <th>Items</th>
                            <th>Budget (KES)</th>
                            <th>Assigned On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assignments as $index => $assignment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $assignment->staff->name }}</td>
                                <td>{{ $assignment->event->title }}</td>
                                <td>{{ $assignment->event->venue }}</td>
                                <td>{{ $assignment->items }}</td>
                                <td>{{ number_format($assignment->budget, 2) }}</td>
                                <td>{{ $assignment->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center mt-4">
            No staff assignments yet.
        </div>
    @endif

</div>

</body>
</html>
