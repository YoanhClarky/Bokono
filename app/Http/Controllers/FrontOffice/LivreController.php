<?php

namespace App\Http\Controllers\FrontOffice;

use App\Models\Livre;
use App\Models\Tel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LivreController extends Controller
{
    public function index(){
        $livres = Livre::OrderBy('titre','Asc')->where('etat',1)->where('yeux',1)->simplePaginate(5); // Utilisez la méthode paginate() sur le modèle Livre
        return view('FrontOffice.livres')->with(compact('livres'));
    }

    public function show($token){
        $livre = Livre::where('token',$token)->firstOrfail(); // Utilisez la méthode paginate() sur le modèle Livre
        return view('FrontOffice.Livre.show')->with(compact('livre'));
    }
    public function telechargerlivre($id)
    {
        $Livre = Livre::find($id);
    
        if (!$Livre) {
            abort(404);
        }
        $telechargement = Tel::firstOrCreate([]); // Récupère le premier enregistrement ou en crée un nouveau s'il n'existe pas
        $telechargement->increment('nbr');
        $timestamp = time();
        // Vous pouvez également ajouter ici le code pour renvoyer le fichier PDF au téléchargement
        $pdfPath = public_path($Livre->url_pdf); //z-vous que le chemin du fichier PDF est correct
        $nomFichierTelechargement = $Livre->titre . " " . $timestamp . ".pdf";
        return response()->download($pdfPath, $nomFichierTelechargement);
    }
}

