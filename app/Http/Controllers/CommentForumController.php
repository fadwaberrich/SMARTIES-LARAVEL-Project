<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentForum;
use App\Models\Forum;

class CommentForumController extends Controller
{
    public function store(Request $request)
    {
        $id = (int)$request->input('id');
        $comment = $request->input('comment');
    
        // Validation rules for the form fields
        $rules = [
            'comment' => 'required|string',
        ];
    
        $messages = [
            'comment.required' => 'Le champ Commentaire est requis.',
            'comment.string' => 'Le champ Commentaire doit être une chaîne de caractères.',
        ];
    
        $request->validate($rules, $messages);
    
        $record = Forum::find($id);
    
        $comment = new CommentForum([
            'comment' => $request->input('comment'),
        ]);
        $record->comments()->save($comment);
    
        return back();
    }
    

       public function destroy(int $comment)
       {
        $record = CommentForum::find($comment);
           $record->delete();
           return back();
        }

}
