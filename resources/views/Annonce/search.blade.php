@extends('front.layout')

@section('content')
<div class="container">
    <h1>Résultats de la recherche</h1>
    @csrf
    <p>Résultats pour : {{ $search }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Téléphone de contact</th>
                <th>Échange possible</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @forelse($annonces as $annonce)
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
                    <td>{{ $annonce->echange }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $annonce->photo) }}" alt="Image" style="max-height: 200px;">
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Aucune annonce trouvée pour la recherche "{{ $search }}"</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection