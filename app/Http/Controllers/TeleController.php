<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Tel;
use Illuminate\Http\Request;

class TeleController extends Controller
{
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
