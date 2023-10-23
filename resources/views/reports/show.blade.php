@extends('back.layout') {{-- Specify the "back" layout here --}}

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="height: 80vh;">
    <div class="row">
        <div class="col-md-12">
            <h1>Report Details</h1>

            <div>
                <strong>Title:</strong> {{ $report->title }}
            </div>

            <div>
                <strong>Description:</strong> {{ $report->description }}
            </div>

            <a href="{{ route('reports.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
