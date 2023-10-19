
@extends('front.layout')

@section('content')
    <h1>Forum</h1>

    <a href="{{ route('forum.create') }}" class="btn btn-primary">Create Forum</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>publication</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($forum as $publication)
                <tr>
                    <td>{{ $publication->id }}</td>
                    <td>{{ $publication->description }}</td>
                    <td>
                        <a href="{{ route('forum.show', $publication->id) }}" class="btn btn-info">View</a>
                        <form action="{{ route('forum.destroy', $publication->id) }}" method="POST">
                          @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-warning">Delete</button>
                           </form>        
                                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
