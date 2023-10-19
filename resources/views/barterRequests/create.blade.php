@extends('front.layout')

@section('content')
<div class="" style="margin-left:210px;">
    <h1>Create Barter Request</h1>

    <form method="POST" action="{{ route('barterRequests.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group py-2">
            <label for="title">Title:</label>
            <input class="form-control" name="title" id="title" rows="4">{{ old('title') }}</input>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group py-2">
            <label for="message">Message:</label>
            <textarea class="form-control" name="message" id="message" rows="4">{{ old('message') }}</textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add Price Field -->
        <div class="form-group py-2">
            <label for="price">Price:</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add Image Field -->
        <div class="form-group py-2">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" name="image" id="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add other form fields here, e.g., barter_id, user_id -->

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    </div>
@endsection