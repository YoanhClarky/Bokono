<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cour;
use App\Models\Courcycle;
use App\Models\Cycle;
use App\Models\Type;

use function PHPSTORM_META\type;

class CourController extends Controller
{
    public function dashboard(){
        return view('BackOffice.dashboard');
    }

    public function index(){
        $items = Courcycle::where('yeux',1)->orderBy('cycle_id','ASC')->simplePaginate(5); // Utilisez la méthode paginate() sur le modèle Livre
        $courfilieres = Courcycle::All();
        return view('BackOffice.cours.index')->with(compact('items','courfilieres'));
    }
    
    public function show($token){
        $item=Courcycle::where('token',$token)->firstOrfail();
        $items=Courcycle::orderBy('type_id','DESC')->get();
        $cycles=Cycle::all();
        $types=Type::all();
        $cours=Cour::all();
        return view('BackOffice.cours.show')->with(compact('item','cycles','types','cours','items'));
    }

    public function store(Request $request)
{
    // Créez d'abord le cours
    $cours = new Cour();
    $cours->designation = $request->input('designation');
    $cours->description = $request->input('description');
    $cours->token = sha1($request->input('designation').time());
    $cours->save();
    
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

        if (!file_exists(public_path('courpdf'))) {
            mkdir(public_path('courpdf'), 0777, true);
        }

        if (in_array($ext, $arr_ext)) {
            $name_with_extension = time() . '.' . $ext;
            $file->move(public_path('courpdf'), $name_with_extension);

            if (isset($data['url_file'])) {
                if (file_exists(public_path($data['url_file']))) {
                    unlink(public_path($data['url_file']));
                }
            }

            $data['url_file'] = 'courpdf/' . $name_with_extension;
        }
    }

    $cour = new Courcycle([
            'type_id'=> $request->type_id,
            'cour_id'=> $cours->id,
            'cycle_id'=> $request->cycle_id,
            'token' => sha1($request->designation.time()),
            'url_pdf' => $data['url_file'],
    ]);
    $cour->save();
    return redirect('dashboard/cours');
}

public function update(Request $request, $id)
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

        if (!file_exists(public_path('courpdf'))) {
            mkdir(public_path('courpdf'), 0777, true);
        }

        if (in_array($ext, $arr_ext)) {
            $name_with_extension = time() . '.' . $ext;
            $file->move(public_path('courpdf'), $name_with_extension);

            // Supprimer l'ancien fichier PDF s'il existe
            $cour = Courcycle::find($id);
            if ($cour) {
                if (file_exists(public_path($cour->url_pdf))) {
                    unlink(public_path($cour->url_pdf));
                }

                $data['url_pdf'] = 'courpdf/' . $name_with_extension;
            } else {
                // Gérer le cas où le livre n'est pas trouvé
                // Vous pouvez rediriger ou afficher un message d'erreur ici
            }
        }
    }
    $cour->type_id = $request->type_id;
    $cour->cour_id = $request->cour_id;
    $cour->cycle_id = $request->cycle_id;
    $cour->save();
    return redirect('dashboard/cours');
}

    public function creation(){
        $types = Type::all(); // Assurez-vous d'avoir le modèle et la table "types"
    $cycles = Cycle::all(); 
        return view('BackOffice.cours.create')->with(compact('types', 'cycles'));
    }

    public function yeux($token){
        $item=Courcycle::Where('token',$token)->firstOrFail();
        $item->yeux=0;
        $item->save();
        return redirect('/dashboard/cours');
    }
    public function enable($token){
        $item=Courcycle::Where('token',$token)->firstOrFail();
        $item->etat=1;
        $item->save();
        return redirect('/dashboard/cours');
    }
    public function desable($token){
        $item=Courcycle::Where('token',$token)->firstOrFail();
        $item->etat=0;
        $item->save();
        return redirect('/dashboard/cours');
    }
}
