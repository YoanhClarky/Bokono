<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bokono etude</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link href="{{asset('template/css/bootstrap.min.css')}}" rel="stylesheet" /> <!-- https://getbootstrap.com/ -->
    {{-- "{{ asset('template/css/styles.css') }}" --}}
    <link href="{{asset('template/fontawesome/css/all.min.css')}}" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="{{asset('template/slick/slick.css')}}" rel='stylesheet' /> <!-- https://kenwheeler.github.io/slick/ -->
    <link href="{{asset('template/slick/slick-theme.css')}}" rel='stylesheet' />
    <link href="{{asset('template/css/templatemo-real-dynamic.css')}}" rel="stylesheet" />
    <!--

https://templatemo.com/tm-547-real-dynamic

-->
<style>
    .table-link {
        color: #545454; /* Couleur de décoloration */
        text-decoration: none; /* Supprime la soulignement du lien */
    }

    .table-link:hover {
        color: #282828; /* Couleur au survol du lien */
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
                        <p class="text-white mb-0 tm-site-desc">ETUDIER PLUS FACILEMENT</p>
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
    <div class="tm-container bg-white">
        <div class="tm-header-stripe w-100"></div>
        <div class="container-fluid mt-4 mb-4">
            <div class="row tm-mb-7 justify-content-center">
                <div class="col-lg-12">
                    <div class="container mt-3">
                        <div class="row justify-content-left" style="padding-bottom: 5px">
                                        <a class="btn btn-primary" href="/dashboard/livre/creation">NOUVEAU LIVRE</a>
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>COLLECTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($livres as $item)
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="/dashboard/livre/show/{{ $item->token }}" class="table-link">
                                                <i class="fas fa-book"></i> {{ " - ".$item->titre.", ".$item->soustitre.", ed: ".$item->edition }}
                                            </a>
                                        </div>
                                        <div>
                                            @if($item->etat)
                                            <a class="btn btn-success btn-sm" href="/dashboard/livre/desactiver/{{ $item->token }}">
                                                <i class="fas fa-check"></i> Est actif
                                            </a>
                                            @else
                                            <a class="btn btn-warning btn-sm" href="/dashboard/livre/activer/{{ $item->token }}">
                                                <i class="fas fa-times"></i> Est inactif
                                            </a>
                                            @endif
                                            <a class="btn btn-danger btn-sm" href="/dashboard/livre/supprimer/{{ $item->token }}">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4 mb-4">
                        {{$livres->links()}}
                    </div>
                </div>
            </div>
        </div>
            
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
