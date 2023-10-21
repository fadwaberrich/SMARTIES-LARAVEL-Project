@extends('front.layout')
@section('content')
<div class="container">
    <h1>Liste des Annonces</h1>
    <div class="row">
        @foreach($annonces as $annonce)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $annonce->photo) }}" class="card-img-top" alt="Image" style="max-height: 200px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $annonce->titre }}</h5>
                    <p class="card-text">
                        Catégorie:
                        @if ($annonce->id_categorie)
                            {{ \App\Models\Category::find($annonce->id_categorie)->name }}
                        @else
                            Catégorie non définie
                        @endif
                    </p>
                    <p class="card-text">{{ $annonce->description }}</p>
                    <p class="card-text">{{ $annonce->telephone }}</p>
                    <p class="card-text">{{ $annonce->echange }}</p>
                </div>
                <div class="card-footer">
                    <!-- Bouton pour éditer l'annonce -->
                    <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn btn-primary" style="background-color: green">Edit</a>
                    
                    <!-- Formulaire pour supprimer l'annonce -->
                    <form method="POST" action="{{ route('annonces.destroy', $annonce->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="background-color:darkred;">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection