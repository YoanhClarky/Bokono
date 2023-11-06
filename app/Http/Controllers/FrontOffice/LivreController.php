<?php

namespace App\Http\Controllers\FrontOffice;

use App\Models\Livre;
use App\Models\Tel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LivreController extends Controller
{
    public function rechercheA(Request $request) {
        $auteur = $request->input('auteur');
        
        // Utilisez $designation pour effectuer votre recherche
        $livres = Livre::OrderBy('titre','Asc')->where('etat', 1)
            ->where('yeux', 1)
            ->whereRaw("LOWER(auteur) LIKE ?", ["%" . strtolower($auteur) . "%"])
            ->get();
        return view('FrontOffice.Livre.rechercheA', compact('livres'));
    }
    public function rechercheT(Request $request) {
        $titre = $request->input('titre');
        
        // Utilisez $designation pour effectuer votre recherche
        $livres = Livre::OrderBy('titre','Asc')->where('etat', 1)
            ->where('yeux', 1)
            ->whereRaw("LOWER(titre) LIKE ?", ["%" . strtolower($titre) . "%"])
            ->get();
        return view('FrontOffice.Livre.rechercheT', compact('livres'));
    }

    public function index(){
        $livres = Livre::OrderBy('titre','Asc')->where('etat',1)->where('yeux',1)->simplePaginate(5); // Utilisez la méthode paginate() sur le modèle Livre
        return view('FrontOffice.livres')->with(compact('livres'));
    }

    public function show($token){
        $livre = Livre::where('token',$token)->firstOrfail();
        return view('FrontOffice.Livre.show')->with(compact('livre'));
    }
    public function telechargerlivre($id)
    {
        $Livre = Livre::find($id);
    
        if (!$Livre) {
            abort(404);
        }
        $telechargement = Tel::firstOrCreate([]); 
        $telechargement->increment('nbr');
        $timestamp = time();
     
        $pdfPath = public_path($Livre->url_pdf); 
        $nomFichierTelechargement = $Livre->titre . " " . $timestamp . ".pdf";
        return response()->download($pdfPath, $nomFichierTelechargement);
    }
}

