<h1>Reports</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
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
                    <button class="btn btn-danger" onclick="deleteReport({{ $report->id }})">Delete</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No reports available.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<script>
function deleteReport(reportId) {
    if (confirm('Are you sure you want to delete this report?')) {
        // Use JavaScript to submit the delete form
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('reports.destroy', ':id') }}'.replace(':id', reportId);
        form.style.display = 'none';

        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var csrfInput = document.createElement('input');
        csrfInput.setAttribute('type', 'hidden');
        csrfInput.setAttribute('name', '_token');
        csrfInput.setAttribute('value', csrfToken);

        var methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'DELETE');

        form.appendChild(csrfInput);
        form.appendChild(methodInput);

        document.body.appendChild(form);
        form.submit();
    }
}
</script>
