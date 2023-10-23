@extends('back.layout') {{-- Specify the "back" layout here --}}

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="height: 80vh;">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Report</h1>

            <form method="POST" action="{{ route('reports.update', $report->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $report->title }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" required>{{ $report->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
