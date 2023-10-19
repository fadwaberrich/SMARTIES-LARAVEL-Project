@extends('front.layout')

@section('content')
    <h1>Create Forum</h1>

    <form method="POST" action="{{ route('forum.store') }}">
        @csrf

        <div class="form-group">
            <label for="publication">Publication:</label>
            <textarea class="form-control" name="title" id="title" rows="4"></textarea>
            <textarea class="form-control" name="description" id="description" rows="4"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @endsection
