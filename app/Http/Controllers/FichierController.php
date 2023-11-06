<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use Illuminate\Http\Request;
use App\Models\Fichier;
use App\Models\Tel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FichierController extends Controller
{
    // Fonction pour afficher le formulaire de création
    public function create()
    {
        $annees=Annee::where('etat',1)->orderBy('designation','ASC')->get();
        $tels=Tel::All();
    
        return view('BackOffice.fichiers.create')->with(compact('tels','annees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'theme' => 'required|string',
            'auteur' => 'required|string',
            'dm' => 'required|string',
            'pdf_file' => 'required|mimes:pdf|max:2048',
            'filiere' => 'required|string',
            'annee_id' => 'required|integer',
        ]);

        $fichier = new Fichier([
            'theme' => $request->theme,
            'auteur' => $request->auteur,
            'dm' => $request->dm,
            'filiere' => $request->filiere,
            'user_id' => Auth::user()->id,
            'annee_id' => $request->annee_id,
        ]);

        // Génération du nom de fichier unique avec SHA1 et timestamp
        $filename = sha1(time() . '_' . $request->file('pdf_file')->getClientOriginalName());
        $path = 'pds/' . $filename . '.pdf';

        // Enregistrement du fichier PDF dans le dossier public/pds
        $request->file('pdf_file')->storeAs('public/pds', $filename . '.pdf');

        $fichier->urlpdf = $path;
        $fichier->save();

        return redirect()->back()->with('success', 'Fichier créé avec succès.');
    }

    public function update(Request $request, Fichier $fichier)
    {
        $request->validate([
            'theme' => 'required|string',
            'auteur' => 'required|string',
            'dm' => 'required|string',
            'pdf_file' => 'nullable|mimes:pdf|max:2048',
            'filiere' => 'required|string',
            'annee_id' => 'required|integer',
        ]);

        $fichier->update([
            'theme' => $request->theme,
            'auteur' => $request->auteur,
            'dm' => $request->dm,
            'filiere' => $request->filiere,
            'user_id' => Auth::user()->id,
            'annee_id' => $request->annee_id,
        ]);

        // Si un nouveau fichier PDF est fourni, mise à jour du fichier
        if ($request->hasFile('pdf_file')) {
            // Suppression de l'ancien fichier PDF
            Storage::delete('public/' . $fichier->urlpdf);

            // Génération du nom de fichier unique avec SHA1 et timestamp
            $filename = sha1(time() . '_' . $request->file('pdf_file')->getClientOriginalName());
            $path = 'pds/' . $filename . '.pdf';

            // Enregistrement du nouveau fichier PDF dans le dossier public/pds
            $request->file('pdf_file')->storeAs('public/pds', $filename . '.pdf');

            $fichier->urlpdf = $path;
            $fichier->save();
        }

        return redirect()->back()->with('success', 'Fichier mis à jour avec succès.');
    }

    public function destroy(Fichier $fichier)
    {
        // Suppression du fichier PDF
        Storage::delete('public/' . $fichier->urlpdf);

        $fichier->delete();

        return redirect()->back()->with('success', 'Fichier supprimé avec succès.');
    }
}

