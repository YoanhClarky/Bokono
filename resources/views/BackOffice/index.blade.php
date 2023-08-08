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
                                    <li class="nav-item active">
                                        <a class="nav-link tm-nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="/create">Création</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="contact.html">Contactez-Nous</a>
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
    <h1>TABLEAU DE BORD/ <span id="telechargement-info" style="color:rgb(156, 155, 155)">{{$tel->nbr." Téléchargement(s)"}}</span></h1>
    @endforeach

    <div class="tm-container bg-white" style="text-align: center;">
        <div class="tm-header-stripe w-100"></div>
        <div class="container-fluid">
            @if($Fichiers->count() >0)
            <input type="search" name="" id="SearchInput" class="search -ml-px" placeholder="Recherche par filière" style="margin-bottom: 10px;margin-top: 10px;border-radius: 25px;"><br>
            @else
            @endif
            <label for="" id="sms"></label>
            <div class="row tm-mb-7">
                @if($Fichiers->count() >0)
                            @foreach ($Fichiers as $Fichier )
                            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-5 fichier-item" style="border-style:ridge;border-radius:25px; margin:5px; box-shadow: 0px 3px 4px 3px rgba(0, 0, 0, 0.2);">
                                <h3 class="tm-text-primary tm-mb-4">{{$Fichier->auteur}}</h3>
                                <div class="section">
                                    <p>THEME : {{$Fichier->theme}}</p>
                                    <p>OPTION : {{$Fichier->filiere}}</p>
                                    <p>DM : {{$Fichier->dm}}</p>
                                    <div class="monographie-container" style="margin-bottom: 10px;">
                                    @php
                                    $timestamp = time();
                                    @endphp
                                        {{-- <embed src="{{asset('pdfs/Methode 5S.pdf')}}" type="application/pdf" width="100%" height="600px" /> --}}
                                        <!-- Ajouter un lien de téléchargement -->
                                        <a href="{{asset('pdfs/MONOGRAPHIE1.pdf')}}" download="{{$Fichier->auteur." ".$Fichier->titre." ".$timestamp}}.pdf" class="btn btn-primary mt-2">Télécharger le PDF</a>
                                        <a href="/Gerer/{{$Fichier->id}}" class="btn btn-danger mt-2">Gérer</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                @else
                <h4>Aucune donnée trouvée</h4>
                @endif
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
   <script>
    // Fonction pour gérer le filtrage en fonction de la filière (non sensible à la casse et aux accents)
    function filterFichiers() {
        const searchInput = document.getElementById('SearchInput');
        const sms = document.getElementById('sms');
        const filterValue = removeAccents(searchInput.value.toLowerCase()); // Convertir en minuscules et supprimer les accents
        const fichiers = document.querySelectorAll('.fichier-item');

        fichiers.forEach(fichier => {
            const filiere = removeAccents(fichier.querySelector('.section p:nth-child(2)').textContent.toLowerCase()); // Convertir en minuscules et supprimer les accents

            // Vérifier si toutes les parties du filtre de recherche sont présentes dans la filière (en minuscules et sans accents)
            const allPartsPresent = filterValue.split(' ').every(part => filiere.includes(part));

            if (allPartsPresent) {
                fichier.style.display = 'block';
                // sms.textContent = "";
            } else {
                fichier.style.display = 'none';
                //sms.textContent = "Aucune donnée trouvée";
            }
        });
    }

    // Fonction pour supprimer les accents d'une chaîne de caractères
    function removeAccents(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    // Écouter l'événement "input" dans le champ de recherche pour filtrer automatiquement
    const searchInput = document.getElementById('SearchInput');
    searchInput.addEventListener('input', filterFichiers);
</script>
</body>
</html>
