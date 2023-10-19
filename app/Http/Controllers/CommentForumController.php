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
        $comment=$request->input('comment');
        // Validation rules for the form fields
        $record = Forum::find($id); // $id est l'ID de l'enregistrement que vous souhaitez récupérer.
        $rules = [
            'comment' => 'required|string',
        ];
        $request->validate($rules);

        $comment = new CommentForum([
            'comment' => $request->input('comment'),
        ]);
        $record->comments()->save($comment);
          return back();
      //  $data = $request->all(); // Récupérez les données du formulaire
    //    $data['publication_id'] = $record->id; // Ajoutez la valeur de publication_id au tableau
     //   CommentForum::create($data);

       }

       public function destroy(int $comment)
       {
        $record = CommentForum::find($comment);
           $record->delete();
           return back();
        }

}
