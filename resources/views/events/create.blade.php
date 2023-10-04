@extends('front.layout')

@section('content')
    <h1>Create Event</h1>

    <form method="POST" action="{{ route('events.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>



        <div class="form-group">
            <label for="ticket_price">Ticket Price:</label>
            <input type="number" name="ticket_price" id="ticket_price" class="form-control" step="0.01" required>
        </div>



        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="upcoming">Upcoming</option>
                <option value="ongoing">Ongoing</option>
                <option value="past">Past</option>
                <option value="canceled">Canceled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
@endsection
