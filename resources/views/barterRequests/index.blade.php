@extends('front.layout')

@section('content')
<div class="" style="margin-left:210px;">
    <h1>Barter Requests</h1>

    <a href="{{ route('barterRequests.create') }}" class="btn btn-primary">Create Barter Request</a>

    <div class="row mt-3">
        @foreach($barterRequests as $barterRequest)
            <div class="col-md-4 mb-4">
                <div class="card d-flex flex-column h-100">
                    <!-- Card Header (e.g., Barter ID) -->
                    <div class="card-header">
                        <h5 class="card-title">{{ $barterRequest->title }}</h5>
                    </div>

                    <!-- Card Body (Image at the top) -->
                    <div class="card-body p-0">


                        <div class="p-3">
                            <!-- Message -->
                            <h6 class="card-subtitle mb-2 text-muted">Message:</h6>
                            <p class="card-text">{{ $barterRequest->message }}</p>

                        </div>
                    </div>

                    <!-- Card Footer (e.g., Actions) -->
                    <div class="card-footer mt-auto">
                        <a href="{{ route('barterRequests.show', $barterRequest->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('barterRequests.edit', $barterRequest->id) }}" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $barterRequest->id }}">Delete</a>

                        @php
        $hasResponse = $barterRequest->response; // Assuming you have a 'response' relationship on your BarterRequest model
    @endphp

    @if (!$hasResponse)

                            <!-- Add a single input field for the message -->
                            <form method="POST" action="{{ route('responses.store') }}">
                                @csrf
                                <input type="hidden" name="barter_request_id" value="{{ $barterRequest->id }}">
                                <input type="text" name="message" placeholder="Enter your message here" class="form-control m-2">
                                @error('message')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" name="status" value="accepted" class="btn btn-success" style="background-color: #4CAF50; color: white;">Accept</button>
<button type="submit" name="status" value="refused" class="btn btn-danger" style="background-color: #D32F2F; color: white;">Refuse</button>

                            </form>

                        @endif

                        <!-- Delete Button/Modal Trigger -->

                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal{{ $barterRequest->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered"> <!-- Apply modal-dialog-centered class here -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Barter Request?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #4CAF50; color: white;">Cancel</button>
                                        <form method="POST" action="{{ route('barterRequests.destroy', $barterRequest->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="background-color: #D32F2F; color: white;">Delete</button>
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
