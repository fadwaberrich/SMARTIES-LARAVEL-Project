

    <h1>Barter Requests</h1>

    <a href="{{ route('barterRequests.create') }}" class="btn btn-primary">Create Barter Request</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barterRequests as $barterRequest)
                <tr>
                    <td>{{ $barterRequest->id }}</td>
                    <td>{{ $barterRequest->message }}</td>
                    <td>
                        <a href="{{ route('barterRequests.show', $barterRequest->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('barterRequests.edit', $barterRequest->id) }}" class="btn btn-warning">Edit</a>
                        <!-- Add a delete button/form here if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
