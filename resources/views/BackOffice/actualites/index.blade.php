<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    
    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 20px;
    }
    
    .news {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .news-item {
        border: 1px solid #ccc;
        margin-bottom: 20px;
        padding: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    h2 {
        font-size: 1.5em;
    }
    
    p {
        font-size: 1em;
    }
    
    a {
        text-decoration: none;
        color: #007BFF;
    }
    
    </style>
    
</head>
<body>
    <form method="POST" action="/dashboard/ajouter-actualite" enctype="multipart/form-data">
        @csrf
        <label for="titre">Titre de l'actualité :</label>
        <input type="text" name="titre" id="titre" required>
    
        <label for="ddate">Date de publication :</label>
        <input type="text" name="ddate" id="ddate" required>
    
        <label for="image">Image de l'actualité :</label>
        <input type="file" name="img" id="image" required>
        <small>Formats pris en charge : jpeg, jpg, png, gif</small>
    
        <label for="contenu">Contenu de l'actualité :</label>
        <textarea name="contenu" id="contenu" required></textarea>
    
        <button type="submit">Ajouter l'actualité</button>
    </form>
    
    <div>
        <section class="news">
            @foreach ($actualites as $item)
            <article class="news-item">
                <h2>{{$item->titre }}</h2>
                <p>Date de publication : {{$item->ddate }}</p>
                <img src="{{$item->img}}" alt="Image de l'article">
                <p>{{$item->contenu }}</p>
            </article>
            @endforeach
            <!-- Ajoutez autant d'articles que nécessaire -->
        </section>
    </div>
</body>
</html>