@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">

  <h1 class="text-2xl font-bold mb-4">Publier une nouvelle photo</h1>
  <form action="/photos" method="POST" class="space-y-4">
    @csrf
    <div class="flex flex-col">
      <label for="category" class="text-gray-700 font-medium mb-2">Catégorie :</label>
      <select id="category" name="category_id" class="shadow-sm rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="flex flex-col">
      <label for="title" class="text-gray-700 font-medium mb-2">Titre :</label>
      <input type="text" id="title" name="title" class="shadow-sm rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" required>
    </div>
    <div class="flex flex-col">
      <label for="url" class="text-gray-700 font-medium mb-2">Lien de l'image :</label>
      <input type="url" id="url" name="url" class="shadow-sm rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" required>
    </div>
    <div class="flex items-center space-x-4">
      <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 1  focus:ring-green-700">Publier</button>
      <a href="/photos" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Retour</a>
    </div>
  </form>

</div>

@endsection