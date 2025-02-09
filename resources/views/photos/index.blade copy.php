<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie de photos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Galerie de photos</h1>
    
    <!-- Authentication Buttons -->
    <div class="mb-4 d-flex justify-content-between">
        @auth
            <div>
                <a href="/photos/create" class="btn btn-primary">Ajouter une nouvelle photo</a>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        @else
            <div>
                <a href="{{ route('login') }}" class="btn btn-success">Se connecter</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">S'inscrire</a>
            </div>
        @endauth
    </div>

    <!-- Photo Gallery -->
    <div class="row">
        @foreach ($photos as $photo)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $photo->url }}" class="card-img-top" alt="{{ $photo->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $photo->title }}</h5>
                    <p class="card-text">Catégorie : {{ $photo->category->name }}</p>
                    <a href="/photos/{{ $photo->id }}" class="btn btn-info">Voir les détails</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
