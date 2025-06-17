<nav class="navbar">
  <a href="{{ route('admin.index') }}" class="back-btn">← Back to Dashboard</a>
  <span class="nav-title">Manage Events</span>
</nav>
<div class="event-section">
  <h2 class="section-title">Upcoming Events</h2>
<!--event form-->
 <form method="POST" action="{{ route('admin.events.store') }}" class="event-form" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Event Title" required>
    <textarea name="description" placeholder="Event Description" required></textarea>
    <input type="text" name="venue" placeholder="Event Venue/Region" required>
    <<label for="target_amount" class="block text-sm font-medium text-white">Donation Target (Ksh)</label>
    <input type="number" step="0.01" name="target_amount"
        value="{{ old('target_amount') }}"
        class="mt-1 p-2 w-full rounded bg-gray-800 text-white border border-gray-600">

    <div class="mb-3">
        <label for="image" class="form-label">Event Image</label>
        <input type="file" class="form-control" name="image" accept="image/*">
    </div>

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


<!-- Styling -->
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: grey;
    color: #333;
    padding: 20px;
  }
  .navbar {
    background-color: navy;
    color: white;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  .back-btn {
    color: orange;
    text-decoration: none;
    font-weight: bold;
    font-size: 16px;
  }

  .back-btn:hover {
    text-decoration: underline;
  }

  .nav-title {
    color: white;
    font-size: 18px;
    font-weight: bold;
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
