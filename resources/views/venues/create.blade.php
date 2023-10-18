@extends('front.layout')

@section('content')
    <h1>Create Venue</h1>

    <form method="POST" action="{{ route('venuess.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="capacity">Capacity:</label>
            <input type="number" name="capacity" id="capacity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="website">Website:</label>
            <input type="url" name="website" id="website" class="form-control">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Create Venue</button>
    </form>
@endsection
