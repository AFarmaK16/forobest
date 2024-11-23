<?php

namespace App\Http\Controllers;
use  App\Models\Comment;


use Illuminate\Http\Request;

class CommentController extends Controller
{
        // Enregistrer un nouveau commentaire
        public function store(Request $request)
        {
            $request->validate([
                'photo_id' => 'required|exists:photos,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'message' => 'required|string',
            ]);
    
            Comment::create($request->all());
            return back()->with('success', 'Commentaire ajouté.');
        }
    
        // Ajouter une réponse à un commentaire
        public function reply(Request $request, Comment $comment)
        {
            $request->validate([
                'photo_id' => 'required|exists:photos,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'message' => 'required|string',
            ]);
    
            $reply = new Comment($request->all());
            $reply->parent_id = $comment->id;
            $reply->save();
    
            return back()->with('success', 'Réponse ajoutée.');
        }
    
    
}
