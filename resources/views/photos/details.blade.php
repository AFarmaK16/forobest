@extends('layouts.app')

@section('content')

  <div class="container mx-auto px-4 py-8 bg-gray-100 rounded-lg shadow-md">

    <h1 class="text-3xl font-bold mb-4 text-violet-700">{{ $photo->title }}</h1>
    <img src="{{ $photo->url }}" class="w-full rounded-lg mb-4" alt="{{ $photo->title }}">
    <p class="text-gray-600"><strong>Catégorie :</strong> {{ $photo->category->name }}</p>

    <h3 class="text-2xl font-bold mb-4 text-violet-700">Commentaires :</h3>
    <ul class="list-group list-group-flush mb-8">
      @foreach ($photo->comments as $comment)
        <li class="list-group-item py-3 px-4 border-b border-gray-300">
          <strong class="text-gray-800">{{ $comment->name }}</strong>: {{ $comment->message }}
        </li>
      @endforeach
    </ul>

    <h3 class="text-2xl font-bold mb-4 text-violet-700">Ajouter un commentaire :</h3>
    <form action="{{ route('comments.store', $photo->id) }}" method="POST" class="space-y-4">
      @csrf
      <div class="flex flex-col">
        <label for="name" class="text-gray-700 font-medium mb-2">Votre nom</label>
        <input type="text" name="name" id="name" class="shadow-sm rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" required>
      </div>
      <div class="flex flex-col">
        <label for="email" class="text-gray-700 font-medium mb-2">Votre email</label>
        <input type="email" name="email" id="email" class="shadow-sm rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" required>
      </div>
      <div class="flex flex-col">
        <label for="message" class="text-gray-700 font-medium mb-2">Votre message</label>
        <textarea name="message" id="message" class="shadow-sm rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1 h-24" required></textarea>
      </div>
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700">Envoyer</button>
    </form>
  </div>

@endsection