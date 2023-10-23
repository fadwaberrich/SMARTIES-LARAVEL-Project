@extends('front.layout')

@section('content')
<div class="" style="margin-left:210px;">
    <h1>Create Barter Request</h1>

    <form method="POST" action="{{ route('barterRequests.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group py-2">
            <label for="title">Title:</label>
            <input class="form-control" name="title" id="title" rows="4" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group py-2">
            <label for="message">Message:</label>
            <textarea class="form-control" name="message" id="message" rows="4">{{ old('message') }}</textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add other form fields here, e.g., barter_id, user_id -->

        <!-- Add reCAPTCHA and error message container -->
        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
        @if ($errors->has('g-recaptcha-response'))
            <div class="text-danger">{{ $errors->first('g-recaptcha-response') }}</div>
        @endif

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
