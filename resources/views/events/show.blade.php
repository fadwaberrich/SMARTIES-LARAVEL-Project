@extends('back.layout')

@section('content')
<div class="container" style="margin-top: 30px;">

    
    <h1>Event Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $event->name }}</h5>
            @if($event->image)
            <img src="{{ asset('storage/' . $event->image) }}" alt="Image" width="100">
            @else
                        No Image
                    @endif
            <p class="card-text"><strong>Description:</strong> {{ $event->description }}</p>
            <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
            
            <p class="card-text"><strong>Ticket Price:</strong> ${{ number_format($event->ticket_price, 2) }}</p>
      
            <p class="card-text"><strong>Status:</strong> {{ $event->status }}</p>
            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit Event</a>
 <!-- Delete Button/Form -->
 <form method="POST" action="{{ route('events.destroy', $event->id) }}" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete Event</button>
            </form>        </div>
    </div>
</div>
@endsection
