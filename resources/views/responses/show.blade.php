@extends('front.layout')

@section('content')
<div class="container">
    <h1>Response Details</h1>

    <div class="alert alert-{{ $response->status === 'accepted' ? 'success' : 'danger' }}">
        <strong>Status: {{ ucfirst($response->status) }}</strong>
    </div>

    <table class="table">
        <tr>
            <th>ID:</th>
            <td>{{ $response->id }}</td>
        </tr>
        <tr>
            <th>Message:</th>
            <td>{{ $response->message }}</td>
        </tr>
        <tr>
            <th>Barter Request:</th>
            <td>{{ $response->barterRequest->title }}</td>
        </tr>
        <!-- Add more rows for other properties related to the ResponseToRequest entity if needed -->
    </table>

    <a href="{{ route('responses.edit', $response->id) }}" class="btn btn-warning">Edit</a>
    <!-- Add a delete button/form here if needed -->
</div>
@endsection
