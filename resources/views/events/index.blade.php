@extends('back.layout')

@section('content')
<div class="container" style="margin-top: 30px;">


    <h1>Event List</h1>

    <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>

                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Location</th>
                <th>Ticket Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>
                    @if($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Image" width="100">
                    @else
                        No Image
                    @endif
</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->location }}</td>

                    <td>${{ number_format($event->ticket_price, 2) }}</td>

                    <td>{{ $event->status }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                        <!-- Add a delete button/form here if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
