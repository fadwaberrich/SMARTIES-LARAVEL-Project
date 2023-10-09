<h1>Report Details</h1>

<div>
    <strong>Title:</strong> {{ $report->title }}
</div>

<div>
    <strong>Description:</strong> {{ $report->description }}
</div>

<a href="{{ route('reports.index') }}" class="btn btn-primary">Back</a>
