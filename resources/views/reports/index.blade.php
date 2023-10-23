@extends('back.layout')

@section('content')
<style>
        .table > :not(caption) > * {
            background-color: var(--fc-table-bg);
            border-bottom-width: var(--fc-border-width);
            box-shadow: inset 0 0 0 9999px var(--fc-table-accent-bg);
            /* Adjust the padding as per your requirements */
            padding: 0.75rem 5rem; /* Adjust the left and right padding values */
        }
    </style>
    <main class="main-content-wrapper">
        <div class="container">
            <h1 class="mt-4 mb-4">Reports</h1>
            
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->title }}</td>
                            <td>{{ $report->description }}</td>
                            <td>
                                <a href="{{ route('reports.show', $report->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-secondary">Edit</a>
                                <form method="POST" action="{{ route('reports.destroy', $report->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this report?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No reports available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
