
    <div class="container">
        <h1>Barter Request Details</h1>

        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $barterRequest->id }}</td>
            </tr>
            <tr>
                <th>Message:</th>
                <td>{{ $barterRequest->message }}</td>
            </tr>
            <tr>
                <th>Barter ID:</th>
                <td>{{ $barterRequest->barter_id }}</td>
            </tr>
            <tr>
                <th>User ID:</th>
                <td>{{ $barterRequest->user_id }}</td>
            </tr>
            <!-- Add more rows for other properties if needed -->
        </table>

        <a href="{{ route('barterRequests.edit', $barterRequest->id) }}" class="btn btn-warning">Edit</a>
        <!-- Add a delete button/form here if needed -->
    </div>
