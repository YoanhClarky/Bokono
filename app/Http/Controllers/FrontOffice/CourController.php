<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Cour;
use App\Models\Tel;
use Illuminate\Http\Request;

class CourController extends Controller
{

    public function index(){
        $cours = Cour::orderBy('designation','ASC')->paginate(5); // Utilisez la méthode paginate() sur le modèle Livre
        return view('FrontOffice.Cour.recherche')->with(compact('cours'));
    }

    public function show($token){
        $cour = Cour::where('token',$token)->firstOrfail(); // Utilisez la méthode paginate() sur le modèle Livre
        return view('FrontOffice.Cour.show')->with(compact('cour'));
    }
    public function telechargercour($id)
    {
        $cour = Cour::find($id);
    
        if (!$cour) {
            abort(404);
        }
        $telechargement = Tel::firstOrCreate([]); // Récupère le premier enregistrement ou en crée un nouveau s'il n'existe pas
        $telechargement->increment('nbr');
        $timestamp = time();
        // Vous pouvez également ajouter ici le code pour renvoyer le fichier PDF au téléchargement
        $pdfPath = public_path($cour->url_pdf); //z-vous que le chemin du fichier PDF est correct
        $nomFichierTelechargement = $cour->designation . " " . $timestamp . ".pdf";
        return response()->download($pdfPath, $nomFichierTelechargement);
    }
}
