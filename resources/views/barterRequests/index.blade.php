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
                        @if($barterRequest->image)
                        <div class="image-container" style="position: relative; overflow: hidden; width: 100%; height: 0; padding-top: 56.25%;">
                            <img src="{{ asset('storage/' . $barterRequest->image) }}" alt="Image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;" class="img-fluid rounded-top">
                        </div>
                        @else
                            No Image
                        @endif
                        
                        <div class="p-3">
                            <!-- Message -->
                            <h6 class="card-subtitle mb-2 text-muted">Message:</h6>
                            <p class="card-text">{{ $barterRequest->message }}</p>
                            
                            <!-- Price -->
                            <h6 class="card-subtitle mb-2 text-muted">Price:</h6>
                            <p class="card-text">{{ $barterRequest->price }} dt</p>
                        </div>
                    </div>

                    <!-- Card Footer (e.g., Actions) -->
                    <div class="card-footer mt-auto">
                        <a href="{{ route('barterRequests.show', $barterRequest->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('barterRequests.edit', $barterRequest->id) }}" class="btn btn-warning">Edit</a>
                        
                        <!-- Delete Button/Modal Trigger -->
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $barterRequest->id }}">Delete</a>

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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('barterRequests.destroy', $barterRequest->id) }}">
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
