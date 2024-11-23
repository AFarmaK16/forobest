<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Photo;

class PhotoController extends Controller
{
    // Afficher toutes les photos
    public function index()
    {
        $photos = Photo::with('category', 'user')->get();
        return view('photos.index', compact('photos'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $categories = Category::all();
        return view('photos.create', compact('categories'));
    }

    // Enregistrer une nouvelle photo
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        Photo::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'url' => $request->url,
        ]);

        return redirect()->route('photos.index')->with('success', 'Photo publiée avec succès.');
    }

    // Supprimer une photo
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photos.index')->with('success', 'Photo supprimée.');
    }
}
