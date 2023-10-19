@extends('front.layout')

@section('content')
    <h1>Create Forum</h1>

    <form method="POST" action="{{ route('forum.store') }}">
    @csrf

    <div class="form-group">
        <label for="title">Titre:</label>
        <textarea class="form-control" name="title" id="title" rows="4"></textarea>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Créer</button>
</form>

    @endsection
