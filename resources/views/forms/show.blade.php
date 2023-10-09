<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Details</title>
    
    <!-- Add the CSRF token meta tag -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Add any other CSS or meta tags you need -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
    <h1>Form Details</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $form->id }}</td>
        </tr>
        <tr>
            <th>Sender Name</th>
            <td>{{ $form->senderName }}</td>
        </tr>
        <tr>
            <th>Receiver Name</th>
            <td>{{ $form->receiverName }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $form->description }}</td>
        </tr>
    </table>
    
    <a href="{{ route('forms.index') }}" class="btn btn-primary">Back</a>
    <a href="{{ route('reports.create', ['form' => $form->id]) }}" class="btn btn-primary">Report</a>

    <!-- Add the "Report" button here -->
    <form method="POST" action="{{ route('reports.store') }}" style="display: inline;">
        @csrf
        <input type="hidden" name="form_id" value="{{ $form->id }}">
       
    </form>
</div>
<script>
function createReport(formId) {
    if (confirm('Are you sure you want to create a report for this form?')) {
        // Use JavaScript to submit the create report form
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('reports.create', ['form' => ':id']) }}'.replace(':id', formId);
        form.style.display = 'none';

        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var csrfInput = document.createElement('input');
        csrfInput.setAttribute('type', 'hidden');
        csrfInput.setAttribute('name', '_token');
        csrfInput.setAttribute('value', csrfToken);

        form.appendChild(csrfInput);

        document.body.appendChild(form);
        form.submit();
    }
}


</script>

</body>
</html>