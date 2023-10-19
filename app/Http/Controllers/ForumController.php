<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Http\Controllers\Controller;
use App\Models\CommentForum;

class ForumController extends Controller
{


 /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        $comments = CommentForum::where('forum_id', $forum->id)->get();
        $forums=Forum::all();
        $commentsCount = count($comments);
        return view('forum.show', compact('forum','comments','forums','commentsCount'));
    }


   /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('forum.index')
        ->with('success', 'publication deleted successfully.');
    }

    public function store(Request $request)
    {
        // Validation rules for the form fields
        $rules = [
            'description' => 'required|string',
        ];
    
        $request->validate($rules);
        Forum::create($request->all());
    
        return redirect()->route('forum.index')
            ->with('success', 'Forum created successfully.');
    }

    public function create()
    {
        return view('forum.create');

    }

    public function index()
    {
        $forum = forum::latest()->get();

        // On transmet les Post à la vue
        return view("forum.index", compact("forum"));
    }
   
}
