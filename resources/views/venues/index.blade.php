@extends('back.layout')

@section('content')
<div class="container" style="margin-top: 30px;">

    
    <h1>Venue List</h1>

    <a href="{{ route('venuess.create') }}" class="btn btn-primary">Create Venue</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Address</th>
                <th>Capacity</th>
                <th>Description</th>
                <th>Website</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venues as $venue)
                <tr>
                    <td>{{ $venue->id }}</td>
                    <td>{{ $venue->name }}</td>
                    <td>
                    @if($venue->image)
                        <img src="{{ asset('storage/' . $venue->image) }}" alt="Image" width="100">
                    @else
                        No Image
                    @endif
</td>
                    <td>{{ $venue->address }}</td>
                    <td>{{ $venue->capacity }}</td>
                    <td>{{ $venue->description }}</td>
                    <td>{{ $venue->website }}</td>
                    <td>{{ $venue->phone }}</td>
                    <td>{{ $venue->email }}</td>
                    <td>
                        <a href="{{ route('venuess.show', $venue->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('venuess.edit', $venue->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Delete Button/Form -->
                        <form method="POST" action="{{ route('venuess.destroy', $venue->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this venue?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
