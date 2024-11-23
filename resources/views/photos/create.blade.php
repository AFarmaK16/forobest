<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une photo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Publier une nouvelle photo</h1>
    <form action="/photos" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="mb-3">
            <label for="category" class="form-label">Catégorie :</label>
            <select id="category" name="category_id" class="form-select">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titre :</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">Lien de l'image :</label>
            <input type="url" id="url" name="url" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Publier</button>
        <a href="/photos" class="btn btn-secondary">Retour</a>
    </form>
</body>
</html>
