<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Fichier;
use App\Models\Tel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class BackController extends Controller
{

    public function listepdf(){
    $tels=Tel::All();
    // dd($tel);
    $Fichiers=Fichier::Orderby('annee_id','DESC')->get();
    return view('BackOffice.index')->with(compact('Fichiers','tels'));
    }

    public function store(Request $request)
    {
        $data = $request->except('pdf_btn');
        $file = $request->file('pdf_btn');

        if ($file) {
            // Ajoutez une règle de validation pour la taille maximale du fichier
            $maxFileSize = 50 * 1024; // Limite de 50 Mo en kilo-octets
            $this->validate($request, [
                'pdf_btn' => 'required|file|max:' . $maxFileSize . '|mimes:pdf',
            ]);

            $ext = $file->getClientOriginalExtension();
            $arr_ext = ['pdf'];

            if (!file_exists(public_path('pdfs'))) {
                mkdir(public_path('pdfs'), 0777, true);
            }

            if (in_array($ext, $arr_ext)) {
                $name_with_extension = time() . '.' . $ext;
                $file->move(public_path('pdfs'), $name_with_extension);

                if (isset($data['url_file'])) {
                    if (file_exists(public_path($data['url_file']))) {
                        unlink(public_path($data['url_file']));
                    }
                }

                $data['url_file'] = 'pdfs/' . $name_with_extension;
            }
        }

        $fichier = new Fichier([
            'theme' => $request->theme,
            'auteur' => $request->auteur,
            'dm' => $request->dm,
            'filiere' => $request->filiere,
            'user_id' => Auth::user()->id,
            'annee_id' => $request->annee_id,
            'pdf_file' => $data['url_file'], // Affecter le chemin du fichier PDF au champ pdf_file
        ]);

        $fichier->save();

        return back();
    }

    public function show($id){
        $fichier=Fichier::find($id);
        return view('BackOffice.fichiers.show')->with(compact('fichier'));
    }

    public function enable($id){
        $fichier = Fichier::find($id);
        $fichier->etat = 1;
        $fichier->save();
        return back();
    }

    public function disable($id){
        $fichier = Fichier::find($id);
        $fichier->etat = 0;
        $fichier->save();
        return back();
    }

    public function delete($id)
    {
        $fichier = Fichier::findOrFail($id);
        // Supprimer les enregistrements associés dans la table 'userproduit'
        $fichier->users()->detach();
        // Supprimer le produit
        $fichier->delete();
        return back();
    }

}
