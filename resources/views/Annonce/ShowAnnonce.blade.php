@extends('front.layout')
@section('content')

<div class="container">
    <h1 style="font-size:1.5rem;">Liste des Annonces</h1>
  
    <form method="GET" action="{{ route('Search') }}" class="mb-3">
        @csrf

        <div class="form-group" style="display:flex; gap:20px;">
            <input type="text" name="titre" class="form-control" placeholder="Rechercher par titre">
       
        
            <button type="submit" class="btn btn-primary" style="background-color: green">Rechercher</button>
        
    </div>
    </form>
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
                    <a href="" class="btn btn-primary" style="background-color: darkblue">Show details</a>
                    
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection