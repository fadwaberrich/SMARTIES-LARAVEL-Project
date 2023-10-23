@extends('front.layout')
@section('content')
    <h1>Received Forms</h1>
    
    @foreach(auth()->user()->receivedForms as $form)
        <div class="form">
            <h2>{{ $form->title }}</h2>
            <p>{{ $form->description }}</p>
            <!-- Add more details as needed -->
        </div>
    @endforeach
@endsection
