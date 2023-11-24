<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bokono-études</title>
    <link rel="stylesheet" href="{{ asset('Mcss.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="search-container" style="color: transparent;">
        <h1>Bokono Etude</h1>
    </div>
    
    <div class="tm-container bg-white">
        {{-- <div class="tm-header-stripe w-100"></div> --}}
        <div class="container-fluid mt-4 mb-4">
            <div class="row tm-mb-7 justify-content-center">
                <div class="col-lg-8">
                    <!-- Début de la carte (card) -->
                    <div class="card">
                        <!-- Image du livre -->
                        <img src="chemin_de_l_image_du_cour.jpg" class="card-img-top" alt="Image du cour">
        
                        <!-- Contenu de la carte -->
                        <div class="card-body">
                            <!-- Titre du livre -->
                            <h5 class="card-title">{{ $inf->cour->designation }}</h5>
        
                            <!-- Description du livre -->
                            <p class="card-text">{{ $inf->cour->description }}Une brève description du cour. Vous pouvez ajouter des détails importants sur le livre.</p>
                            @php
                            $timestamp = time();
                            @endphp
                            <!-- Bouton de téléchargement -->
                            <a href="{{ url('cour/telecharger/' . $inf->id) }}" download="{{$inf->cour->designation." ".$timestamp}}.pdf" class="btn btn-primary mt-2">Télécharger le PDF</a>
                        </div>
                    </div>
                    <!-- Fin de la carte (card) -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>



 
 
 
 