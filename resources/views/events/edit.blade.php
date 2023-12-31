@extends('back.layout')

@section('content')
<div class="container" style="margin-top: 30px;">


    <h1>Edit Event</h1>

    <form method="POST" action="{{ route('events.update', $event->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $event->name }}" >
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror   </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="4" >{{ $event->description }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $event->date }}" >
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror     </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}" >
            @error('location')
                <div class="text-danger">{{ $message }}</div>
            @enderror    </div>



        <div class="form-group">
            <label for="ticket_price">Ticket Price:</label>
            <input type="number" name="ticket_price" id="ticket_price" class="form-control" step="0.01" value="{{ $event->ticket_price }}" >
            @error('ticket_price')
                <div class="text-danger">{{ $message }}</div>
            @enderror    </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" >
                <option value="upcoming" {{ $event->status === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="ongoing" {{ $event->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="past" {{ $event->status === 'past' ? 'selected' : '' }}>Past</option>
                <option value="canceled" {{ $event->status === 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror  </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
