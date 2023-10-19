@extends('front.layout')

@section('content')
<div class="" style="margin-left:210px;">
    <h1>Edit Barter Request</h1>

    <form method="POST" action="{{ route('barterRequests.update', $barterRequest->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Use PUT or PATCH based on your form -->
        <div class="form-group py-2">
            <label for="title">Title:</label>
            <input class="form-control" name="title" id="title" rows="4"  value="{{ $barterRequest->title }}"></input>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" name="message" id="message" rows="4">{{ $barterRequest->message }}</textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add Price Field -->
        <div class="form-group py-2">
            <label for="price">Price:</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ $barterRequest->price }}">
            
            <!-- Display Price Error Message -->
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Display Current Image -->
        <div class="form-group py-2">
            @if($barterRequest->image)
                <label>Current Image:</label>
                <img src="{{ asset('storage/' . $barterRequest->image) }}" alt="Current Image" width="100">
            @else
                <p>No Current Image</p>
            @endif
        </div>

        <!-- Update Image -->
        <div class="form-group py-2">
            <label for="image">Update Image:</label>
            <input type="file" class="form-control-file" name="image" id="image">
            
            <!-- Display Image Error Message -->
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add other form fields here, e.g., barter_id, user_id -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
