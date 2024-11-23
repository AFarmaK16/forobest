@extends('layouts.app')

@section('content')
@auth
<div class="mb-4">
    <a href="/photos/create" class="btn btn-primary">Ajouter une nouvelle photo</a>
</div>
@endauth

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($photos as $photo)
    <div class="card shadow-md rounded-lg overflow-hidden bg-white border border-gray-200">
        <img src="{{ $photo->url }}" class="w-full h-48 object-cover object-center" alt="{{ $photo->title }}">
        <div class="p-4">
            <h5 class="text-lg font-bold text-gray-800 mb-2">{{ $photo->title }}</h5>
            <p class="text-sm text-gray-600 mb-4">{{ $photo->category->name }}</p>
            <a href="/photos/{{ $photo->id }}" class="btn inline-flex items-center px-4 py-2 bg-purple-500 text-white font-bold rounded-lg shadow hover:bg-purple-700 transition duration-300">
                Voir les détails
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
