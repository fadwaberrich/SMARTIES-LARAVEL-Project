<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Http\Controllers\Controller;
use App\Models\CommentForum;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{


 /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        $comments = CommentForum::with('sender')->where('forum_id', $forum->id)->get();

        $forums=Forum::all();
        $commentsCount = count($comments);
        return view('forum.show', compact('forum','comments','forums','commentsCount'));
    }


   /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {




        $comment = CommentForum::where('forum_id', $forum->id);

        if ($comment) {
            $comment->delete();
            $forum->delete();

        } else {
            $forum->delete();
        }


        return redirect()->route('forum.index')
        ->with('success', 'publication deleted successfully.');
    }


public function store(Request $request)
{
    // Validation rules for the form fields
    $rules = [
        'description' => 'required|string',
        'title' => 'required|string',
    ];

    // Personnalisez les messages d'erreur (facultatif)
    $messages = [
        'description.required' => 'La description est requise.',
        'title.required' => 'Le titre est requis.',
    ];

    $request->validate($rules, $messages);

    // Obtenir l'utilisateur actuellement connecté
    $user = Auth::user();

    // Créer un nouveau forum en incluant l'ID de l'utilisateur
    $forum = new Forum([
        'user_id' => $user->id,
        'title' => $request->input('title'),
        'description' => $request->input('description'),
    ]);
    $forum->save();

    return redirect()->route('forum.index')
        ->with('success', 'Forum créé avec succès.');
}

    
    public function create()
    {
        return view('forum.create');

    }

    public function index()
    {
        $forum = Forum::with('sender')
        ->withCount('comments')
        ->get();
            // On transmet les Post à la vue
        return view("forum.index", compact("forum"));
    }
   
}
