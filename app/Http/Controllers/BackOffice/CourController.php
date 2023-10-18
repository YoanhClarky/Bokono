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
        $cycles=Cycle::all();
        $types=Type::all();
        $cours=Cour::all();
        return view('BackOffice.cours.show')->with(compact('item','cycles','types','cours'));
    }

    public function store(Request $request)
{
    // Créez d'abord le cours
    $cours = new Cour();
    $cours->designation = $request->input('designation');
    $cours->description = $request->input('description');
    $cours->token = sha1($request->input('designation').time());
    $cours->save();

    // Ensuite, créez le courcycle en utilisant le cours fraîchement créé
    $courcycle = new Courcycle();
    $courcycle->type_id = $request->input('type_id');
    $courcycle->cycle_id = $request->input('cycle_id');
    $courcycle->cour_id = $cours->id; // Utilisez l'ID du cours créé
    $courcycle->token = sha1($request->input('cycle_id').time());
    $courcycle->save();
    return redirect('dashboard/cours');
}

public function update(Request $request, $id)
{
    // Validez les données du formulaire
    $request->validate([
        'type_id' => 'required|exists:types,id',
        'cycle_id' => 'required|exists:cycles,id',
    ]);

    // Récupérez le modèle CourCycle à mettre à jour par son ID
    $courCycle = CourCycle::find($id);

    if (!$courCycle) {
        return redirect('dashboard/cours');
    }

    // Mettez à jour les champs du modèle CourCycle
    $courCycle->type_id = $request->input('type_id');
    $courCycle->cycle_id = $request->input('cycle_id');
    $courCycle->save();

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
