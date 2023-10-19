@extends('front.layout')

@section('content')
<div class="" style="margin-left:210px;">
    <h1>Responses to Requests</h1>

    <a href="{{ route('responses.create') }}" class="btn btn-primary">Create Response</a>

    <div class="row mt-3">
        @foreach($responses as $response)
            <div class="col-md-4 mb-4">
                <div class="card d-flex flex-column h-100">
                    <!-- Card Header (e.g., Response ID) -->
                    <div class="card-header">
                        <h5 class="card-title">{{ $response->id }}</h5>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-3">
                        <!-- Message -->
                        <h6 class="card-subtitle mb-2 text-muted">Message:</h6>
                        <p class="card-text">{{ $response->message }}</p>

                        <!-- Status -->
                        <h6 class="card-subtitle mb-2 text-muted">Status:</h6>
                        <p class="card-text">{{ $response->status }}</p>

                        <!-- Barter Request -->
                        <h6 class="card-subtitle mb-2 text-muted">Barter Request:</h6>
                        <p class="card-text">{{ $response->barterRequest->title }}</p>

                        <!-- Add other fields related to the ResponseToRequest entity -->
                    </div>

                    <!-- Card Footer (e.g., Actions) -->
                    <div class="card-footer mt-auto">
                        <a href="{{ route('responses.show', $response->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('responses.edit', $response->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Delete Button/Modal Trigger -->
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $response->id }}">Delete</a>

                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal{{ $response->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered"> <!-- Apply modal-dialog-centered class here -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Response?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form method="POST" action="{{ route('responses.destroy', $response->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Delete Confirmation Modal -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
