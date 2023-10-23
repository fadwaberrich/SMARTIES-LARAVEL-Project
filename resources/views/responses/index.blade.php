@extends('front.layout')

@section('content')
<div class="" style="margin-left:210px;">
    <h1>Responses to Requests</h1>

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
                        <!-- Barter Request -->
                        <h6 class="card-subtitle mb-2 text-muted">Barter Request:</h6>
                        <p class="card-text">{{ $response->barterRequest->title }}</p>

                        <!-- Status -->
                        <h6 class="card-subtitle mb-2 text-muted">Status:</h6>
                        <p class="card-text" style="color: {{ $response->status === 'accepted' ? 'green' : 'red' }}">
                            {{ $response->status }}
                        </p>

                        <!-- "Continue Request" button -->
                        @if ($response->status === 'accepted')
                            <a href="{{ route('forms.create') }}" class="btn btn-success">Continue Request</a>
                        @endif

                        <!-- Add other fields related to the ResponseToRequest entity -->
                    </div>

                    <!-- Card Footer (e.g., Actions) -->
                    <div class="card-footer mt-auto">
                        <a href="{{ route('responses.show', $response->id) }}" class="btn btn-info">View</a>

                        <!-- Delete Button/Modal Trigger -->
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $response->id }}">Delete</a>

                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal{{ $response->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <!-- ... (your existing modal code) ... -->
                        </div>
                        <!-- End Delete Confirmation Modal -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
