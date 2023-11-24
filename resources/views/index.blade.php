<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bokono-études</title>
    <link rel="stylesheet" href="{{ asset('Mcss.css') }}">
</head>

<body>
    <div class="search-container">
        <form class="d-flex" action="{{ url('/search') }}" method="get">
            <input class="search-input" type="search" name="searchTerm" placeholder="Recherche..."
                aria-label="Search">
            <button class="search-btn" type="submit">Search</button>
        </form>
    </div>
    <div class="container">
        @foreach ($livres as $item)
        <div class="col-md-4 mb-4">
            <div class="book-card">
                <div class="book-header">
                    <a href="/livres/show/{{ $item->token }}">
                        <img src="{{ asset('logo/pdf-icon-4.png') }}" class="card-img-top" alt="Logo PDF">
                    </a>
                </div>
                <div class="book-body">
                    <h5 class="book-title">{{"Titre livre : ". $item->titre }}</h5>
                    <h6 class="book-st">{{"Sous-Titre : ". $item->soustitre }}</h6>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($cours as $ite)
        <div class="col-md-4 mb-4">
            <div class="book-card">
                <div class="book-header">
                    <a href="/cours/show/{{ $ite->token }}">
                        <img src="{{ asset('logo/pdf-icon-4.png') }}" class="card-img-top" alt="Logo PDF">
                    </a>
                </div>
                <div class="book-body">
                    <h5 class="book-title">{{"Titre cours : ". $ite->cour->designation }}</h5>
                    <h6 class="book-st">{{"Sous-Titre : ". $ite->cour->description }}</h6>
                </div>
            </div>
        </div>
        @endforeach

        @foreach ($resumes as $item)
        <div class="col-md-4 mb-4">
            <div class="book-card">
                <div class="book-header">
                    <a href="/resumes/show/{{ $item->token }}">
                        <img src="{{ asset('logo/pdf-icon-4.png') }}" class="card-img-top" alt="Logo PDF">
                    </a>
                </div>
                <div class="book-body">
                    <h5 class="book-title">{{"Titre resume : ". $item->designation }}</h5>
                    {{-- <h6 class="book-st">{{"Sous-Titre : ". $item->description }}</h6> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>
