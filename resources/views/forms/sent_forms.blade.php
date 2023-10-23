@extends('front.layout')
@section('content')
    <h1>Sent Forms</h1>
    
    @foreach(auth()->user()->sentForms as $form)
        <div class="form">
            <h2>{{ $form->title }}</h2>
            <p>{{ $form->description }}</p>
            <!-- Add more details as needed -->
        </div>
    @endforeach
@endsection
