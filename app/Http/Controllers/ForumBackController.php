<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Http\Controllers\Controller;
use App\Models\CommentForum;
use Illuminate\Support\Facades\Auth;
class ForumBackController extends Controller
{
    public function show(int $id)
    {
        $comments = CommentForum::with('sender')->where('forum_id', $id)->get();
        $forum = Forum::find($id);

        $forums=Forum::all();
        $commentsCount = count($comments);
        return view('back/forum/forum.show', compact('forum','comments','forums','commentsCount'));
    }


    public function destroy(int $id)
    {
        $forum = Forum::find($id);



        $comment = CommentForum::where('forum_id', $id);

        if ($comment) {
            $comment->delete();
            $forum->delete();

        } else {
            $forum->delete();
        }




        return redirect()->route('backforum.index')
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
        $forum = Forum::with('sender')->get();
        // On transmet les Post à la vue
        return view("back/forum/forum.index", compact("forum"));
    }
}
