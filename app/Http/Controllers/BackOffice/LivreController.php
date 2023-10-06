<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Livre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LivreController extends Controller
{
    public function index(){
        $livres = Livre::where('yeux',1)->OrderBy('updated_at','desc')->simplePaginate(5); // Utilisez la méthode paginate() sur le modèle Livre
        return view('BackOffice.livres.index')->with(compact('livres'));
    }

    public function creation(){
        return view('BackOffice.livres.create');
    }

    public function create(Request $request){
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

            if (!file_exists(public_path('livrephoto'))) {
                mkdir(public_path('livrephoto'), 0777, true);
            }

            if (in_array($ext, $arr_ext)) {
                $name_with_extension = time() . '.' . $ext;
                $file->move(public_path('livrephoto'), $name_with_extension);

                if (isset($data['url_file'])) {
                    if (file_exists(public_path($data['url_file']))) {
                        unlink(public_path($data['url_file']));
                    }
                }

                $data['url_file'] = 'livrephoto/' . $name_with_extension;
            }
        }

        $livre = new Livre([
                'auteur'=> $request->auteur,
                'titre'=> $request->titre,
                'soustitre'=> $request->soustitre,
                'edition'=> $request->edition,
                'lieupub'=> $request->lieupub,
                'maisoned'=> $request->maisoned,
                'datepub'=> $request->datepub,
                'page'=> $request->page,
                'url_pdf' => $data['url_file'], // Affecter le chemin du fichier PDF au champ pdf_file
                'token' => sha1($request->titre.$request->auteur.time()),
        ]);
        $livre->save();
        return redirect('dashboard/livres');
    }

    public function show($token){
        $livre=Livre::where('token',$token)->firstOrfail();
        return view('BackOffice.livres.show')->with(compact('livre'));
    }
    
    public function update(Request $request, $id){
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
    
            if (!file_exists(public_path('livrephoto'))) {
                mkdir(public_path('livrephoto'), 0777, true);
            }
    
            if (in_array($ext, $arr_ext)) {
                $name_with_extension = time() . '.' . $ext;
                $file->move(public_path('livrephoto'), $name_with_extension);
    
                // Supprimer l'ancien fichier PDF s'il existe
                $livre = Livre::find($id);
    
                if ($livre) {
                    if (file_exists(public_path($livre->url_pdf))) {
                        unlink(public_path($livre->url_pdf));
                    }
    
                    $data['url_pdf'] = 'livrephoto/' . $name_with_extension;
                } else {
                    // Gérer le cas où le livre n'est pas trouvé
                    // Vous pouvez rediriger ou afficher un message d'erreur ici
                }
            }
        }
    
        // Mettez à jour les autres champs du livre
        $livre->update([
            'auteur'=> $request->auteur,
            'titre'=> $request->titre,
            'soustitre'=> $request->soustitre,
            'edition'=> $request->edition,
            'lieupub'=> $request->lieupub,
            'maisoned'=> $request->maisoned,
            'datepub'=> $request->datepub,
            'page'=> $request->page,
            'url_pdf' => $data['url_pdf'],
        ]);
    
        return redirect('dashboard/livres');
    }
    

    public function yeux($token){
        $livre=Livre::Where('token',$token)->firstOrFail();
        $livre->yeux=0;
        $livre->save();
        return redirect('/dashboard/livres');
    }
    public function enable($token){
        $livre=Livre::Where('token',$token)->firstOrFail();
        $livre->etat=1;
        $livre->save();
        return redirect('/dashboard/livres');
    }
    public function desable($token){
        $livre=Livre::Where('token',$token)->firstOrFail();
        $livre->etat=0;
        $livre->save();
        return redirect('/dashboard/livres');
    }
}

