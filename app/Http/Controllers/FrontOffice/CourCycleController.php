<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Cour;
use App\Models\Courcycle;
use App\Models\Courfiliere;
use App\Models\Tel;
use Illuminate\Http\Request;

class CourCycleController extends Controller
{
    public function index(){
        $items = Courcycle::orderBy('cycle_id','ASC')->get(); // Utilisez la méthode paginate() sur le modèle Livre
        $courfilieres = Courfiliere::All();
        return view('FrontOffice.cours')->with(compact('items','courfilieres'));
    }
    public function show($token){
        $inf = Courcycle::where('token',$token)->firstOrfail(); // Utilisez la méthode paginate() sur le modèle Livre
        //dd($inf);
        return view('FrontOffice.Cour.show')->with(compact('inf'));
    }
    public function telechargercour($id)
    {
        $courcycle = Courcycle::find($id);
    
        if (!$courcycle) {
            abort(404);
        }
        $telechargement = Tel::firstOrCreate([]); // Récupère le premier enregistrement ou en crée un nouveau s'il n'existe pas
        $telechargement->increment('nbr');
        $timestamp = time();
        // Vous pouvez également ajouter ici le code pour renvoyer le fichier PDF au téléchargement
        $pdfPath = public_path($courcycle->url_pdf); //z-vous que le chemin du fichier PDF est correct
        $nomFichierTelechargement = $courcycle->cour->designation . " " . $timestamp . ".pdf";
        return response()->download($pdfPath, $nomFichierTelechargement);
    }
}
