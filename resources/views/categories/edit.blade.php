@extends('layouts.app')
    @section('content')
    <h1 class="text-3xl font-bold mb-4 text-gray-800">Modifier la catégorie</h1>
    <form action="/categories/{{ $category->id }}" method="POST">
        @csrf
        @method('PUT') <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nom de la catégorie :</label>
            <input type="text" id="name" name="name" class="shadow-sm rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1 w-full" value="{{ $category->name }}" required>
        </div>
        <div class="flex justify-end space-x-2">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-700">Mettre à jour</button>
            <a href="/categories" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Retour</a>
        </div>
    </form>
    @endsection