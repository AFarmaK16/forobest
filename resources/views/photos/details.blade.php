<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la photo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>{{ $photo->title }}</h1>
    <img src="{{ $photo->url }}" class="img-fluid mb-4" alt="{{ $photo->title }}">
    <p><strong>Catégorie :</strong> {{ $photo->category->name }}</p>

    <h3>Commentaires :</h3>
    <ul class="list-group mb-4">
        @foreach ($photo->comments as $comment)
        <li class="list-group-item">
            <strong>{{ $comment->name }}</strong>: {{ $comment->message }}
        </li>
        @endforeach
    </ul>

    <h3>Ajouter un commentaire :</h3>
    <form action="/photos/{{ $photo->id }}/comments" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Votre nom" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Votre email" required>
        </div>
        <div class="mb-3">
            <textarea name="message" class="form-control" placeholder="Votre message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</body>
</html>
