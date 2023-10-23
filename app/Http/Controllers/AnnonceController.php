<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class AnnonceController extends Controller
{
    public function index()
    {
        $annonces = Annonce::all();
        return view('Annonce.ShowAnnonce', compact('annonces'));
    }
    public function Back()
    {
        $annonces = Annonce::all();
        return view('back.ShowAnnonceBack', compact('annonces'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Annonce.FormAnnonce', compact('categories'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_categorie'=>'nullable|required',
            'id_user'=>'nullable|required',
            'titre' => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'telephone' => 'required|numeric',
            'photo' => 'image',
            'echange' => 'nullable|required', ],
             [
            'titre.required' => 'Le champs titre est obligatoire.',
            'titre.string'=>'le titre doit etre une chaine de caractere ',
            'titre.min:3'=>'le titre doit etre plus long que 3 lettres',

            'description.required' => 'Le champs description est obligatoire.',

            'telephone.required' => 'Le champs téléphone est obligatoire.',
            'telephone.numeric' => 'Le champs téléphone doit être un numéro.',
            
            
        ]);

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('annonce_photos', 'public');
            $validatedData['photo'] = $imagePath;
        }



        $announcement = Annonce::create($validatedData);
        $announcementId = $announcement->id;
        return redirect()->route('products.create', ['annonce_id' => $announcementId]);
    }

    public function show(Annonce $annonce)
    {
        return view('annonce.show', compact('annonce'));
    }


    public function edit(Annonce $annonce)

    {
        $categories = Category::all();

        return view('Annonce.FormEditAnnonce', compact('categories','annonce'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        $validatedData = $request->validate([
            'id_categorie'=>'nullable|required',
            'titre' => 'required',
            'description' => 'required',
            'telephone' => 'required',
            'photo' => 'nullable|image',
            'echange' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('annonce_photos', 'public');
            $validatedData['photo'] = $imagePath;
        }

        $annonce->update($validatedData);

        return redirect()->route('user.announcements')->with('success', 'Annonce updated successfully');
    }

    public function showUserAnnouncements()
{
    // Get the currently logged-in user
    $user = auth()->user();

    // Retrieve announcements for the user
    $userAnnouncements = Annonce::where('id_user', $user->id)->get();

    return view('Annonce.ShowUserAnnouncements', compact('userAnnouncements'));
}

    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('user.announcements')->with('success', 'Annonce deleted successfully');
    }




    public function destroyBack(Annonce $annonce)
    {
        $annonce->delete();
        $annonces = Annonce::all();
        return view('back.ShowAnnonceBack', compact('annonces'));

    }





    public function search(Request $request)
{
    $search = $request->input('search');

    // Affichez le terme de recherche pour vérification
  

    // Effectuez la recherche en utilisant le titre de l'annonce
    $annonces = Annonce::where('titre', 'like', '%' . $search . '%')->get();

    // Affichez les résultats intermédiaires pour vérification


    return view('Annonce.Find', compact('annonces', 'search'));
}
//////pdf annonce////
public function generatePDF()
{
     // Récupérez la liste des annonces depuis votre modèle
     $annonces = Annonce::all();

     // Chargez la vue dans laquelle vous souhaitez afficher les annonces
     $view = view('back.pdfAnnonce', compact('annonces'));

     // Générez le PDF à partir de la vue
     $pdf = PDF::loadHtml($view);

     // Téléchargez le PDF ou affichez-le dans le navigateur
     return $pdf->download('annonces.pdf');
     //Pdf::loadView($view)->stream('annonces.pdf');
     // $pdf->download('annonces.pdf');
}


}
