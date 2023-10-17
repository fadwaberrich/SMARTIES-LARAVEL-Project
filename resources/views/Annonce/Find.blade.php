@extends('front.layout')
@section('content')
<div class="container">





    <h1>Résultats de la recherche</h1>
   <!-- Formulaire de recherche -->
   <form action="{{ route('Search') }}" method="GET" class="mb-3">
    @csrf
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Rechercher par titre">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </div>
</form>

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
                    <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil"></i>
                    </a>
                    
                    <!-- Formulaire pour supprimer l'annonce -->
                    <form method="POST" action="{{ route('annonces.destroy', $annonce->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> 
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection