@extends('front.layout')

@section('content')
    <div class="container">
        <h1>Annonce Details</h1>

        <table class="table">
            <tr>
                <th>Image:</th>
                <td>
                    <img src="{{ asset('storage/' . $annonce->photo) }}" alt="Image" style="max-height: 200px;">
                </td>
            </tr>
            <tr>
                <th>Title:</th>
                <td>{{ $annonce->titre }}</td>
            </tr>
            <tr>
                <th>Catégorie:</th>
                <td>
                    @if ($annonce->id_categorie)
                        {{ \App\Models\Category::find($annonce->id_categorie)->name }}
                    @else
                        Catégorie non définie
                    @endif
                </td>
            </tr>
            <tr>
                <th>Description:</th>
                <td>{{ $annonce->description }}</td>
            </tr>
            <tr>
                <th>Téléphone:</th>
                <td>{{ $annonce->telephone }}</td>
            </tr>
            <tr>
                <th>Échange:</th>
                <td>{{ $annonce->echange }}</td>
            </tr>
        </table>

        <!-- Edit and delete buttons can be added here similar to the Barter Request page -->
    </div>
@endsection
