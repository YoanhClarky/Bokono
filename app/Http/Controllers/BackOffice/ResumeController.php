<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cour;
use App\Models\Resume;

class ResumeController extends Controller
{
    public function index(){
        $resumes = Resume::where('yeux',1)->OrderBy('updated_at','desc')->simplePaginate(5); // Utilisez la méthode paginate() sur le modèle Livre
        return view('BackOffice.resumes.index')->with(compact('resumes'));
    }
    public function creation(){
        $cours = Cour::where('yeux',1)->get();
        return view('BackOffice.resumes.create')->with(compact('cours'));
    }
    public function show($token){
        $resume=Resume::where('yeux',1)->where('token',$token)->firstOrfail();
        $cours=Cour::where('yeux',1)->get();
        return view('BackOffice.resumes.show')->with(compact('resume','cours'));
    }
    public function store(Request $request){
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

            if (!file_exists(public_path('resumepdf'))) {
                mkdir(public_path('resumepdf'), 0777, true);
            }

            if (in_array($ext, $arr_ext)) {
                $name_with_extension = time() . '.' . $ext;
                $file->move(public_path('resumepdf'), $name_with_extension);

                if (isset($data['url_file'])) {
                    if (file_exists(public_path($data['url_file']))) {
                        unlink(public_path($data['url_file']));
                    }
                }

                $data['url_file'] = 'resumepdf/' . $name_with_extension;
            }
        }

        $resume = new Resume([
                'designation'=> $request->designation,
                'cour_id'=> $request->cour_id,
                'url_pdf' => $data['url_file'],
                'token' => sha1($request->designation.time()),
        ]);
        $resume->save();
        return redirect('dashboard/resumes');
    }

    public function update(Request $request, $id)
{
    // Validez les données du formulaire
    $request->validate([
        'designation' => 'required|string|max:255',
        'cour_id' => 'required|exists:cours,id',
        'pdf_btn' => 'nullable|file|max:51200|mimes:pdf', // Limite de 50 Mo pour les fichiers PDF
    ]);

    // Récupérez l'objet Resume à mettre à jour par son ID
    $resume = Resume::find($id);

    if (!$resume) {
        return redirect('dashboard/resumes')->with('error', 'Resume non trouvé.');
    }

    // Gérez la mise à jour du fichier PDF
    $file = $request->file('pdf_btn');

    if ($file) {
        $ext = $file->getClientOriginalExtension();
        $allowedExtensions = ['pdf'];

        if (in_array($ext, $allowedExtensions)) {
            $maxFileSize = 51200; // 50 Mo en kilo-octets
            if ($file->getSize() <= $maxFileSize) {
                // Supprimez l'ancien fichier PDF s'il existe
                if (file_exists(public_path($resume->url_pdf))) {
                    unlink(public_path($resume->url_pdf));
                }

                // Déplacez le nouveau fichier PDF vers le répertoire de stockage
                $name_with_extension = time() . '.' . $ext;
                $file->move(public_path('resumepdf'), $name_with_extension);
                $resume->url_pdf = 'resumepdf/' . $name_with_extension;
            } else {
                return redirect()->back()->with('error', 'La taille du fichier PDF dépasse la limite de 50 Mo.');
            }
        } else {
            return redirect()->back()->with('error', 'Le fichier doit être au format PDF.');
        }
    }

    // Mettez à jour les autres champs du modèle Resume
    $resume->designation = $request->designation;
    $resume->cour_id = $request->cour_id;
    $resume->save();

    return redirect('dashboard/resumes')->with('success', 'Resume mis à jour avec succès.');
}

    public function yeux($token){
        $resume=Resume::Where('token',$token)->firstOrFail();
        $resume->yeux=0;
        $resume->save();
        return redirect('/dashboard/resumes');
    }
    public function enable($token){
        $resume=Resume::Where('token',$token)->firstOrFail();
        $resume->etat=1;
        $resume->save();
        return redirect('/dashboard/resumes');
    }
    public function desable($token){
        $resume=Resume::Where('token',$token)->firstOrFail();
        $resume->etat=0;
        $resume->save();
        return redirect('/dashboard/resumes');
    }

}
