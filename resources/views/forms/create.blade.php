@extends('front.layout')
@section('content')
  <main class="p-10">
  @yield('content')
  <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
            <div class="card-header" style="background-color: #007BFF; color: #fff; font-weight: bold; font-size: 24px;">
    Offer your product
</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('forms.store') }}" enctype="multipart/form-data">
                        @csrf

                        

                        <div class="form-group">
                            <label for="title" style="font-weight: bold;">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description" style="font-weight: bold;">Description</label>
                            <textarea name="description" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image" style="font-weight: bold;">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary" style="background-color: #007BFF; color: #fff;">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(isset($form->image))
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-3">
                    <div class="card-header" style="background-color: #007BFF; color: #fff; font-weight: bold;">
                        Uploaded Image
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $form->image) }}" alt="Uploaded Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
  </main>
@endsection








 
