<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\Tel;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index(){
        $resumes = resume::paginate(5); // Utilisez la méthode paginate() sur le modèle Livre
        return view('FrontOffice.resumes')->with(compact('resumes'));
    }

    public function show($token){
        $resume = Resume::where('token',$token)->firstOrfail(); // Utilisez la méthode paginate() sur le modèle Livre
        return view('FrontOffice.Resume.show')->with(compact('resume'));
    }
    public function telechargerresume($id)
    {
        $resume = resume::find($id);
    
        if (!$resume) {
            abort(404);
        }
        $telechargement = Tel::firstOrCreate([]); // Récupère le premier enregistrement ou en crée un nouveau s'il n'existe pas
        $telechargement->increment('nbr');
        $timestamp = time();
        // Vous pouvez également ajouter ici le code pour renvoyer le fichier PDF au téléchargement
        $pdfPath = public_path($resume->url_pdf); //z-vous que le chemin du fichier PDF est correct
        $nomFichierTelechargement = $resume->designation . " " . $timestamp . ".pdf";
        return response()->download($pdfPath, $nomFichierTelechargement);
    }
}
