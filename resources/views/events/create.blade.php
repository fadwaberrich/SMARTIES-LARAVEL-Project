@extends('back.layout')

@section('content')
<div class="" style="margin-left: 210px; margin-top:50px;">
    <h1>Create Event</h1>

    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group py-2">
            <label for="name">Name:</label>
            <input class="form-control" name="name" id="name" value="{{ old('name') }}" >
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group py-2">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="4" >{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group py-2">
            <label for="date">Date:</label>
            <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}" >
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group py-2">
            <label for="location">Location:</label>
            <input class="form-control" name="location" id="location" value="{{ old('location') }}" >
            @error('location')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group py-2">
            <label for="ticket_price">Ticket Price:</label>
            <input type="number" class="form-control" name="ticket_price" id="ticket_price" step="0.01" value="{{ old('ticket_price') }}" >
            @error('ticket_price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group py-2">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status" >
                <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="past" {{ old('status') == 'past' ? 'selected' : '' }}>Past</option>
                <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group py-2">
            <label for="venue_id">Select Venue:</label>
            <select class="form-control{{ $errors->has('venue_id') ? ' is-invalid' : '' }}" name="venue_id" id="venue_id" >
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}" {{ old('venue_id') == $venue->id ? 'selected' : '' }}>
                        {{ $venue->name }}
                    </option>
                @endforeach
            </select>
            @error('venue_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
</div>
@endsection
