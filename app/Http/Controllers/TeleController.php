<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use App\Models\Tel;
use Illuminate\Http\Request;

class TeleController extends Controller
{
    public function telecharger($id)
{
    // Récupérez le fichier correspondant à partir de la base de données
    $Fichier = Fichier::find($id);

    if (!$Fichier) {
        // Gérez le cas où le fichier n'a pas été trouvé
        // Vous pouvez renvoyer une erreur 404 ou rediriger l'utilisateur vers une page d'erreur
        abort(404);
    }

    // Enregistrez le téléchargement dans la table "telechargement"
    $telechargement = Tel::firstOrCreate([]); // Récupère le premier enregistrement ou en crée un nouveau s'il n'existe pas
    $telechargement->increment('nbr');
    $timestamp = time();
    // Vous pouvez également ajouter ici le code pour renvoyer le fichier PDF au téléchargement
    $pdfPath = public_path($Fichier->pdf_file); // Assurez-vous que le chemin du fichier PDF est correct
    $nomFichierTelechargement = $Fichier->auteur . " " . $Fichier->annee->designation . " Soutenance " . $Fichier->titre . " " . $timestamp . ".pdf";
    return response()->download($pdfPath, $nomFichierTelechargement);
    // Vous pouvez également rediriger vers la page précédente si nécessaire
    // return redirect()->back();
}

}
