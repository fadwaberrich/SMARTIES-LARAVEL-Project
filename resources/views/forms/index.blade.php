@extends('back.layout')
@section('content')
    <main class="main-content-wrapper">
        <div class="container">
            <h1 class="mt-4 mb-4">Exchanged Forms</h1>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Sorting Links -->
            <div class="mb-4">
                <a href="{{ route('forms.index', ['sort' => 'asc']) }}" class="btn btn-link">Sort by Oldest</a>
                <a href="{{ route('forms.index', ['sort' => 'desc']) }}" class="btn btn-link">Sort by Newest</a>
            </div>

            <!-- Search Form -->
            <form action="{{ route('forms.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by title" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            <!-- Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($forms as $form)
                        <tr>
                            <td>{{ $form->id }}</td>
                            <td>{{ $form->title }}</td>
                            <td>{{ $form->description }}</td>
                            <td>
                                @if ($form->image)
                                    <img src="{{ asset('storage/' . $form->image) }}" alt="Form Image" class="img-thumbnail" width="100">
                                @else
                                    No image available
                                @endif
                            </td>
                            <td>{{ $form->created_at }}</td>
                            <td>
                                <a href="{{ route('forms.edit', $form->id) }}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{ route('forms.destroy', $form->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No forms available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
