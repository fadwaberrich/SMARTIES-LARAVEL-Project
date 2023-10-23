@extends('front.layout')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Exchanged Forms</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Sorting Links -->
        <div class="mb-4">
            <a href="{{ route('front.forms.index', ['sort' => 'asc']) }}" class="btn btn-link">Sort by Oldest</a>
            <a href="{{ route('front.forms.index', ['sort' => 'desc']) }}" class="btn btn-link">Sort by Newest</a>
        </div>

        <!-- Search Form -->
        <form action="{{ route('front.forms.index') }}" method="GET" class="mb-4">
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
                            @if (!$form->reported)
                                <a href="{{ route('forms.create-report', ['form' => $form->id]) }}" class="btn btn-warning">Report</a>
                            @else
                                <!-- Show something else if the form has already been reported -->
                            @endif
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
@endsection
