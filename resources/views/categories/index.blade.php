<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des catégories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Liste des catégories</h1>
    <a href="/categories/create" class="btn btn-primary mb-3">Ajouter une nouvelle catégorie</a>
    <ul class="list-group">
        @foreach ($categories as $category)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $category->name }}
            <div>
                <a href="/categories/{{ $category->id }}/edit" class="btn btn-warning btn-sm">Modifier</a>
                <form action="/categories/{{ $category->id }}" method="POST" class="d-inline">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</body>
</html>
