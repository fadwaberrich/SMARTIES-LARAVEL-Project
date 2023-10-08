<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Include the csrf-token here -->
    <title>Your Page Title</title>
</head>
<div class="container">
    <h1>Forms</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sender Name</th>
                <th>Receiver Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($forms as $form)
                <tr>
                    <td>{{ $form->id }}</td>
                    <td>{{ $form->senderName }}</td>
                    <td>{{ $form->receiverName }}</td>
                    <td>{{ $form->description }}</td>
                    <td>
                        <a href="{{ route('forms.edit', $form->id) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="deleteForm({{ $form->id }})">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No forms available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
function deleteForm(formId) {
    if (confirm('Are you sure you want to delete this form?')) {
        // Use JavaScript to submit the delete form
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('forms.destroy', ':id') }}'.replace(':id', formId);
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
