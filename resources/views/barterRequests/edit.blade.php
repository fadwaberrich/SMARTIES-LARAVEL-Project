
    <h1>Edit Barter Request</h1>

    <form method="POST" action="{{ route('barterRequests.update', $barterRequest->id) }}">
        @csrf
        @method('PUT') <!-- Use PUT or PATCH based on your form -->

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" name="message" id="message" rows="4">{{ $barterRequest->message }}</textarea>
        </div>

        <!-- Add other form fields here, e.g., barter_id, user_id -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
