<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monographies</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet" /> <!-- https://getbootstrap.com/ -->
    {{-- "{{ asset('template/css/styles.css') }}" --}}
    <link href="{{asset('template/fontawesome/css/all.min.css')}}" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="{{asset('template/slick/slick.css')}}" rel='stylesheet' /> <!-- https://kenwheeler.github.io/slick/ -->
    <link href="{{asset('template/slick/slick-theme.css')}}" rel='stylesheet' />
    <link href="{{asset('template/css/templatemo-real-dynamic.css')}}" rel="stylesheet" />
<!--

TemplateMo 547 Real Dynamic

https://templatemo.com/tm-547-real-dynamic

-->
</head>

<body>
    <div class="tm-container">

        <div class="tm-site-header-overlay">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 tm-site-header-left">
                        <h1 class="text-uppercase tm-site-name">MONOGRAPHIE FACILE</h1>
                        <p class="text-white mb-0 tm-site-desc">LISTE DES MONOGRAPHIES</p>
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
                                    <li class="nav-item ">
                                        <a class="nav-link tm-nav-link" href="/dashboards">Accueil</a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link tm-nav-link" href="/create">Création<span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="/contact">Contactez-Nous</a>
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
    @foreach ($tels as $tel )
    <h1>TABLEAU DE BORD/ <span style="color:rgb(156, 155, 155)">{{$tel->nbr." Téléchargement(s)"}}</span></h1>
    @endforeach

    <!--Body-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">{{ isset($fichier) ? 'Modifier le fichier' : 'Créer un nouveau fichier' }}</div>
                    <div class="card-body">
                        <form action="{{ route('fichiers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="theme">Thème</label>
                                <input type="text" class="form-control" name="theme" required>
                            </div>
                            <div class="form-group">
                                <label for="auteur">Auteur</label>
                                <input type="text" class="form-control" name="auteur" required>
                            </div>
                            <div class="form-group">
                                <label for="dm">DM</label>
                                <input type="text" class="form-control" name="dm" required>
                            </div>
                            <div class="form-group">
                                <label for="pdf_btn">Fichier PDF</label>
                                <input type="file" class="form-control-file" name="pdf_btn" accept=".pdf" required>
                            </div>
                            <div class="form-group">
                                <label for="filiere">Filière</label>
                                <input type="text" class="form-control" name="filiere" value="{{ isset($fichier) ? $fichier->filiere : old('filiere') }}" required>
                            </div>
                            <div class="form-group" hidden="false">
                                <label for="user_id">Nom de l'utilisateur</label>
                                <input type="number" class="form-control" name="user_id" value="{{ Auth::user()->id }}" required>
                            </div>
                            <div class="form-group">
                                <label for="annee_id">Année</label>
                                <select class="form-control" name="annee_id" required>
                                    @foreach ($annees as $annee)
                                        <option value="{{ $annee->id }}" {{ isset($fichier) && $fichier->annee_id === $annee->id ? 'selected' : '' }}>
                                            {{ $annee->designation }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Body-->

    <footer class="row">
                <div>
                    <a href="https://youtube.com" class="tm-social-link"><i class="fab fa-youtube tm-social-icon"></i></a>
                    <a href="https://fb.com/templatemo" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
                    <a href="https://twitter.com" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
                    <a href="https://instagram.com" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
                </div>
                <p class="mb-0 w-100 text-center col-12">
                    Company &copy; 2020 Company Name

                    - Real Dynamic by <a rel="nofollow" href="https://templatemo.com" class="tm-text-link">TemplateMo</a>
                </p>
            </footer>
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
</body>
</html>

