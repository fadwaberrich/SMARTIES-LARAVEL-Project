
@extends('back.layout')
@section('content')


<div class="container" style="margin-top: 30px;">

    
    <h1>Liste des Annonces</h1>

    <a href="{{ route('generatePDF') }}" class="btn btn-primary mb-3">Générer un PDF</a>

    <table class="table">
        <thead>
            <tr>
                <th><strong>Titre</strong></th>
                <th><strong>Catégorie</strong></th>
                <th><strong>Description</strong></th>
                <th><strong>Téléphone de contact</strong></th>
                <th><strong>Échange souhaité</strong></th>
                <th><strong>Image</strong></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($annonces as $annonce)
            <tr>
                <td>{{ $annonce->titre }}</td>
                <td>
                    @if ($annonce->id_categorie)
                        {{ \App\Models\Category::find($annonce->id_categorie)->name }}
                    @else
                        Catégorie non définie
                    @endif
                </td>
                <td>{{ $annonce->description }}</td>
                <td>{{ $annonce->telephone }}</td>
                <td>{{ $annonce->echange   }}</td>
                <td>
                    <img src="{{ asset('storage/' . $annonce->photo) }}" alt="Image" style="width: 180px; height: auto;">
                </td>
                <td>
                    <form method="POST" action="{{ route('destroyBack', $annonce->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> 
                        </button>
                    </form>
                </td>
                <!-- Affichez d'autres détails de l'annonce si nécessaire -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection