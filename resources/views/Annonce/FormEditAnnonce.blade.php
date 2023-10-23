@extends('front.layout')

@section('content')
<div class="container">
    <h1 style="font-size: 1.5rem;">Modifier l'Annonce</h1>
    <form action="{{ route('annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_categorie">Catégorie</label>
            <select name="id_categorie" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="titre"></label>
            <input type="text" name="titre" class="form-control" value="{{ $annonce->titre }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $annonce->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone de contact</label>
            <input type="text" name="telephone" class="form-control" value="{{ $annonce->telephone }}">
        </div>

        <div class="form-group">
            <label for="photo">Image de l'article</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <div class="form-group">
            <label for="echange">Échange possible</label>
            <input type="text" name="echange" class="form-control" value="{{ $annonce->echange }}">
        </div>
        <br/>


        <button type="submit" class="btn btn-primary" style="background-color: green">Update</button>
        <a href="{{ route('products.edit', $annonce->product->id) }}" class="btn btn-warning">Edit Product</a>

        <a href="{{ route('user.announcements') }}" class="btn btn-primary" style="background-color: blue">Back</a>

    </form>
</div>
@endsection
