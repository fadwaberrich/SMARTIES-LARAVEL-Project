@extends('front.layout')

@section('content')
    <h1>Create Barter Request</h1>

    <form method="POST" action="{{ route('barterRequests.store') }}">
        @csrf

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" name="message" id="message" rows="4"></textarea>
        </div>

        <!-- Add other form fields here, e.g., barter_id, user_id -->

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @endsection
