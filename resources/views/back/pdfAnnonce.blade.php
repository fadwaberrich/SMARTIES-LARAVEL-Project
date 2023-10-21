
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Annonces</title>

    <!-- Ajoutez le code CSS ici -->
    <style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            border: 5px solid #343a40; /* Bordure de 5px solide en couleur #343a40 */
        }


        h1 {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Liste des Annonces</h1>
    
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
                <td>{{ $annonce->echange }}</td>
                <td>
                    @if ($annonce->photo)
                        <img src="{{ public_path('storage/' . $annonce->photo) }}" alt="Image de l'annonce" width="150" height="auto">
                    @else
                        Pas d'image
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
