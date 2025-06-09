<div class="event-section">
  <h2 class="section-title">Edit Event</h2>

  <form method="POST" action="{{ route('admin.events.update', $event->id) }}" class="event-form">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ old('title', $event->title) }}" required>
    <textarea name="description" required>{{ old('description', $event->description) }}</textarea>
    <input type="text" name="venue" value="{{ old('venue', $event->venue) }}" placeholder="Event Venue/Region" required>
    <input type="date" name="event_date" value="{{ old('event_date', $event->event_date) }}" required>

    <button type="submit" class="add-btn">Update Event</button>
  </form>

  <div style="margin-top: 20px;">
    <a href="{{ route('admin.events.index') }}" class="edit-btn">← Back to Events</a>
  </div>
</div>

<style>
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
  }

  .edit-btn {
    background-color: navy;
    color: white;
    padding: 10px 15px;
    border-radius: 6px;
    text-decoration: none;
  }

  .edit-btn:hover {
    background-color: #001f4d;
  }
</style>
