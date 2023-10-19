@extends('back.layout')

@section('content')
<div class="container" style="margin-top: 30px;">

    
    <h1>Edit Venue</h1>

    <form method="POST" action="{{ route('venuess.update', $venue->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $venue->name }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $venue->address }}" required>
        </div>

        <div class="form-group">
            <label for="capacity">Capacity:</label>
            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $venue->capacity }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $venue->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="url" name="website" id="website" class="form-control" value="{{ $venue->website }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" class="form-control" value="{{ $venue->phone }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $venue->email }}">
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Update Venue</button>
    </form>
</div>
@endsection
