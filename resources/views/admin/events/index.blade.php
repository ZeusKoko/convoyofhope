<!DOCTYPE html>
<html>
<head>
   @include('admin.css')
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">admin Panel</a>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li class="dropdown-header">Manage Account</li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Log Out</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="d-flex align-items-stretch">
@include('admin.sidebar')
<div class="page-content">
   

<div class="event-section">
  <h2 class="section-title">Upcoming Events</h2>

  <!-- Add Event Form -->
  <form method="POST" action="{{ route('admin.events.store') }}" class="event-form">
    @csrf
    <input type="text" name="title" placeholder="Event Title" required>
    <textarea name="description" placeholder="Event Description" required></textarea>
    <input type="text" name="venue" placeholder="Event Venue/Region" required>
    <input type="date" name="event_date" required>
    <button type="submit" class="add-btn">Add Event</button>
  </form>

  <!-- Event List -->
  <ul class="event-list">
    @foreach ($events as $event)
      <li class="event-item {{ \Carbon\Carbon::parse($event->event_date)->isPast() ? 'past' : 'upcoming' }}">
        <strong>{{ $event->title }}</strong> <br>
        <em>{{ $event->venue }}</em> <br>
        {{ $event->description }} <br>
        <small>{{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}</small>

        @if (!\Carbon\Carbon::parse($event->event_date)->isPast())
          <!-- Edit and Delete only for upcoming events -->
          <div class="btn-group">
            <a href="{{ route('admin.events.edit', $event->id) }}" class="edit-btn">Edit</a>
            <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="delete-btn">Delete</button>
            </form>
          </div>
        @endif
      </li>
    @endforeach
  </ul>
</div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>

<!-- Styling -->
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    color: #333;
    padding: 20px;
  }

  .event-section {
    max-width: 600px;
    margin: auto;
    background: #ffffff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }

  .section-title {
    color: navy;
    font-size: 28px;
    margin-bottom: 20px;
    text-align: center;
  }

  .event-form input,
  .event-form textarea {
    display: block;
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
  }

  .add-btn {
    background-color: green;
    color: white;
    font-weight: bold;
    padding: 12px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s;
  }

  .add-btn:hover {
    background-color: #0a7e0a;
  }

  .event-list {
    list-style-type: none;
    padding: 0;
    margin-top: 30px;
  }

  .event-item {
    background: white;
    border-left: 6px solid orange;
    margin: 15px 0;
    padding: 15px;
    border-radius: 6px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.05);
  }

  .event-item.past {
    opacity: 0.6;
    border-left-color: gray;
  }

  .btn-group {
    margin-top: 10px;
  }

  .edit-btn,
  .delete-btn {
    text-decoration: none;
    padding: 8px 12px;
    margin-right: 10px;
    border-radius: 4px;
    font-size: 14px;
    display: inline-block;
  }

  .edit-btn {
    background-color: navy;
    color: white;
  }

  .delete-btn {
    background-color: red;
    color: white;
    border: none;
    cursor: pointer;
  }

  .delete-btn:hover {
    background-color: darkred;
  }
</style>
