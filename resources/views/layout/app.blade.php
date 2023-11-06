<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('book-solid.svg') }}">
    <title>Bokono etude</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet" /> <!-- https://getbootstrap.com/ -->
    {{-- "{{ asset('template/css/styles.css') }}" --}}
    <link href="{{asset('template/fontawesome/css/all.min.css')}}" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="{{asset('template/slick/slick.css')}}" rel='stylesheet' /> <!-- https://kenwheeler.github.io/slick/ -->
    <link href="{{asset('template/slick/slick-theme.css')}}" rel='stylesheet' />
    <link href="{{asset('template/css/templatemo-real-dynamic.css')}}" rel="stylesheet" />
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
    <div class="tm-container">
        <div class="tm-site-header-overlay">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 tm-site-header-left">
                        <h1 class="text-uppercase tm-site-name">BOKONO ETUDE</h1>
                        {{-- <p class="text-white mb-0 tm-site-desc">ETUDIER PLUS FACILEMENT</p> --}}
                    </div>
                    <div class="col-lg-8 tm-site-header-right">
                        <!--Navbar-->
                        <nav class="navbar navbar-expand-lg">
                            <!-- Collapse button -->
                            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse"
                                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation"><span class="dark-blue-text"><i
                                        class="fas fa-bars text-white"></i></span></button>
                            <!-- Collapsible content -->
                            <div class="collapse navbar-collapse tm-nav" id="navbarNav">
                                <!-- Links -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link tm-nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="/livres">Livres</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="/resumes">Résumés</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="/cours">Cours</a>
                                    </li>
                                
                                    @auth <!-- Vérifiez si l'utilisateur est connecté -->
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Déconnexion
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="/login">
                                            Connexion
                                        </a>
                                    </li>
                                @endauth
                                </ul>

                                <!-- Links -->
                            </div>
                            <!-- Collapsible content -->
                        </nav>
                        <!--/.Navbar-->
                    </div> <!-- col -->
                </div> <!-- row -->
            </div> <!-- container fluid -->
        </div> <!-- tm-site-header-overlay -->
    </div>
    <div class="tm-container bg-white">
        {{-- <div class="tm-header-stripe w-100"></div> --}}
        <div class="container-fluid">
            <header>
                <h1>Actualités</h1>
            </header>
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
            </div> <!-- container-fluid -->
    </div>

    <script src="{{asset('template/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('template/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/js/parallax.min.js')}}"></script> <!-- https://pixelcog.github.io/parallax.js/ -->
    <script src="{{asset('template/slick/slick.min.js')}}"></script>
    <script src="{{asset('template/js/tooplate-script.js')}}"></script>
    <script>
        $(document).ready(function () {
            // Testimonials carousel
            $('.tm-carousel').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1
            });
        });
    </script>
<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="owl-carousel testimonial-carousel">
            @foreach ($commentaires as $item)
            <div class="testimonial-item bg-light rounded p-4 border border-primary shadow-sm">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('Com/profile.png') }}" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1 pl-3">{{ $item->nom }}</h5>
                        <small class="text-grey mb-3 pl-3"><i>{{ $item->contenu  }}</i></small>
                    </div>
                    <div class="ps-5">
                        <small class="text-grey mb-3 pl-3"><i>{{ $item->created_at  }}</i></small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>        
    </div>
</div>
<!-- Testimonial End -->
<div class="col-md-6 pt-4">
    <div class="wow fadeInUp" data-wow-delay="0.5s">
        <form action="{{ route('commentaire.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nom" id="name" placeholder="Entrez votre Nom">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" name="contenu" placeholder="Laissez un message ici" id="message" style="height: 150px"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Envoyer le Message</button>
                </div>
            </div>
        </form>
    </div>
</div>
<style>
.form-floating {
    margin-bottom: 20px;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 5px;
}

/* Personnalisation des étiquettes */
label {
    color: #495057;
}

/* Personnalisation du bouton */
.btn-primary {
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
}

.btn-primary:hover {
    background-color: #0056b3;
    color: #fff;
}
</style>

</body>
<footer class="row">
    <div>
        <a href="https://youtube.com" class="tm-social-link"><i class="fab fa-youtube tm-social-icon"></i></a>
        <a href="https://fb.com/templatemo" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
        <a href="https://twitter.com" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
        <a href="https://instagram.com" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
    </div>
</footer>

</html>
