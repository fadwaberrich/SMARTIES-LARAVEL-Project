@extends('front.layout')

@section('content')
    <div class="container">
        <h1>Barter Request Details</h1>

        <table class="table">
            <tr>
                <th>Title:</th>
                <td>{{ $barterRequest->title }}</td>
            </tr>
            <tr>
                <th>Message:</th>
                <td>{{ $barterRequest->message }}</td>
            </tr>

            <!-- Add more rows for other properties if needed -->
        </table>

        <a href="{{ route('barterRequests.edit', $barterRequest->id) }}" class="btn btn-warning">Edit</a>
        <!-- Add a delete button/form here if needed -->
    </div>
@endsection
