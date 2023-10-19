@extends('front.layout')

@section('content')
<div class="" style="margin-left:210px;">
    <h1>Edit Response to Request</h1>

    <form method="POST" action="{{ route('responses.update', $response->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT or PATCH based on your form -->
        <div class="form-group py-2">
            <label for="message">Message:</label>
            <textarea class="form-control" name="message" id="message" rows="4">{{ $response->message }}</textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <!-- Assuming you have a foreign key relationship with BarterRequest -->
        <div class="form-group py-2">
            <label for="barter_request_id">Barter Request:</label>
            <select class="form-control" name="barter_request_id" id="barter_request_id">
                @foreach ($barterRequests as $barterRequest)
                    <option value="{{ $barterRequest->id }}" {{ $response->barter_request_id === $barterRequest->id ? 'selected' : '' }}>
                        {{ $barterRequest->title }}
                    </option>
                @endforeach
            </select>
            @error('barter_request_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add other form fields for ResponseToRequest entity as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
