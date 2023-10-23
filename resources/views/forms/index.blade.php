@extends('back.layout')
@section('content')
    <main class="main-content-wrapper">
        <div class="container">
            <h1>Forms</h1>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="color: black;">Title</th>
                        <th style="color: black;">Description</th>
                        <th style="color: black;">Image</th>
                        <th style="color: black;">Actions</th>
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
                                    <img src="{{ asset('storage/' . $form->image) }}" alt="Form Image" width="100">
                                @else
                                    No image available
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('forms.edit', $form->id) }}" class="btn btn-primary">Edit</a>


                                <form method="POST" action="{{ route('forms.destroy', $form->id) }}"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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
        <style>
            /* Add your CSS styles here */
            .container {
                margin-top: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid #ccc;
            }

            th,
            td {
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #007BFF;
                color: #fff;
            }

            .alert-success {
                background-color: #28a745;
                color: #fff;
                padding: 10px;
                margin-top: 20px;
            }

            /* Font styles */
            h1 {
                font-size: 24px;
                font-weight: bold;
            }

            /* Button styles */
            .btn {
                margin: 5px;
                padding: 10px 20px;
            }

            .btn-primary {
                background-color: #007BFF;
                color: #fff;
            }

            .btn-info {
                background-color: #17a2b8;
                color: #fff;
            }

            .btn-danger {
                background-color: #dc3545;
                color: #fff;
            }
        </style>

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

    </main>
@endsection
