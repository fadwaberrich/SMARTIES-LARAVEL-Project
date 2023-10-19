@extends('front.layout')

@section('content')
<div class="container" style="margin-top: 30px;">

    <div class="row mt-3">
        @foreach($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="Event Image">
                    @else
                        <img src="{{ asset('placeholder-image.jpg') }}" class="card-img-top" alt="Event Image Placeholder">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Date:</strong> {{ $event->date }}</li>
                        <li class="list-group-item"><strong>Location:</strong> {{ $event->location }}</li>
                        <li class="list-group-item"><strong>Ticket Price:</strong> ${{ number_format($event->ticket_price, 2) }}</li>
                        <li class="list-group-item"><strong>Status:</strong> {{ $event->status }}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
