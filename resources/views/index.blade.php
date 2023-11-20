<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezOqVyDStZDJqFqUdjG2LMWSKT27D/De5Ff/SLFfz+9aGIaIPuwvHcNT2tcQ1Pi6" crossorigin="anonymous">
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .book-card {
      max-width: 280px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
      margin: 10px;
    }

    .book-header {
      height: 150px;
      overflow: hidden;
    }

    .book-header img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }

    .book-body {
      height: 120px; /* Hauteur fixe pour la partie corps de la carte */
      padding: 15px;
    }

    .book-title {
      font-size: 1.2em;
      font-weight: bold;
      margin-bottom: 10px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      color: #3d3d3d;
    }

    .book-st {
      font-size: 1.0em;
      font-weight: bold;
      margin-bottom: 10px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      color: #666;
    }

    .book-description {
      font-size: 0.9em;
      color: #666;
      max-height: 60px; /* Hauteur fixe pour la description */
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .download-button {
      display: inline-block;
      padding: 8px 16px;
      font-size: 1em;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      color: #fff;
      background-color: #007bff;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .download-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>


    <div class="container">
        <div class="row">
          @foreach ($livres as $item)
          <div class="col-md-4 mb-4">
            <div class="book-card">
              <div class="book-header">
                <a href="/livres/show/{{ $item->token }}">
                  <img src="{{ asset('logo/pdf-icon-4.png') }}" class="card-img-top" alt="Logo PDF">
                </a>
              </div>
              <div class="book-body">
                <h5 class="book-title">{{"Titre : ". $item->titre }}</h5>
                <h6 class="book-st">{{"Sous-Titre : ". $item->soustitre }}</h6>
                {{-- <p class="book-description">AUTEUR : {{ $item->auteur }}</p> --}}
                {{-- <a href="lien_de_telechargement1.pdf" class="btn btn-primary">
                  <i class="fas fa-download"></i> Télécharger
                </a> --}}
              </div>
            </div>
          </div>
          
          
          @endforeach
          <div class="d-flex justify-content-center mt-4">
            {{$livres->links()}}
          </div>
        </div>
      </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
