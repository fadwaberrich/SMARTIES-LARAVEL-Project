@extends('front.layout')
@section('content')

<h1>Create Report for Form {{ $form->id }}</h1>

<form method="POST" action="{{ route('reports.store') }}">
    @csrf

    <input type="hidden" name="form_id" value="{{ $form->id }}">
    
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection
