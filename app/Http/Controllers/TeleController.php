<?php

namespace App\Http\Controllers;

use App\Models\Tel;
use Illuminate\Http\Request;

class TeleController extends Controller
{
    public function telecharger()
    {
        // Enregistrez le téléchargement dans la table "telechargement"
        $telechargement = Tel::firstOrCreate([]); // Récupère le premier enregistrement ou en crée un nouveau s'il n'existe pas
        $telechargement->increment('nbr');

        return redirect()->back(); // Redirige vers la page précédente après le téléchargement
    }
}
