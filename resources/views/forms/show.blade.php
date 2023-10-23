@extends ('front.layout')
@section('content')
  <main class="p-10">
  @yield('content')
  <!DOCTYPE html>
<html>

<body>
    <div class="container">
        <h1>Proposition Details</h1>

        <table class="table">
          
            <tr>
                <th>Title</th>
                <td>{{ $form->title }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $form->description }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    @if($form->image)
                        <img src="{{ asset('storage/' . $form->image) }}" alt="Form Image" class="form-image">
                    @else
                        No image available
                    @endif
                </td>
            </tr>
        </table>

        <a href="{{ route('forms.index') }}" class="btn btn-primary">Back</a>

        <a href="{{ route('reports.create', ['form' => $form->id]) }}" class="btn btn-primary">Report</a>
    </div>

    <!-- Add the "Report" button here -->
    <form method="POST" action="{{ route('reports.store') }}" style="display: inline;">
        @csrf
        <input type="hidden" name="form_id" value="{{ $form->id }}">
    </form>

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

  </main>


 @endsection
