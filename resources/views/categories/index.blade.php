@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center text-violet-700 dark:text-white mb-6">Liste des catégories</h1>
    <a href="/categories/create" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded mb-4 inline-block">
        Ajouter une nouvelle catégorie
    </a>

    <ul class="list-none divide-y divide-gray-200 dark:divide-gray-700">
        @foreach ($categories as $category)
        <li class="flex justify-between items-center p-4 hover:bg-gray-200 dark:hover:bg-gray-600">
            <span class="text-lg font-medium text-gray-800 dark:text-white">{{ $category->name }}</span>
            <div class="flex space-x-2">
                <a href="/categories/{{ $category->id }}/edit" class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-3 rounded text-sm font-medium">
                    Modifier
                </a>
                <form action="/categories/{{ $category->id }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded text-sm font-medium">
                        Supprimer
                    </button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection