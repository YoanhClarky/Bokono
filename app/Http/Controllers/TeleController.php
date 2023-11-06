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
    $telechargement = Tel::firstOrCreate([]);
    $telechargement->increment('nbr');
    $timestamp = time();
    $pdfPath = public_path($Livre->url_pdf);
    $nomFichierTelechargement = $Livre->titre . " " . $timestamp . ".pdf";
    return response()->download($pdfPath, $nomFichierTelechargement);
}

}
