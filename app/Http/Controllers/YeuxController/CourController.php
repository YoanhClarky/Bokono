<?php

namespace App\Http\Controllers\YeuxController;

use App\Http\Controllers\Controller;
use App\Models\Cour;
use App\Models\Courcycle;
use App\Models\Tel;
use Illuminate\Http\Request;

class CourController extends Controller
{
    public function index(){
        $tels = Tel::All();
        $items = Courcycle::simplePaginate(5); // Utilisez la méthode paginate() sur le modèle Livre
        $courfilieres = Courcycle::All();
        return view('YeuxOffice.cour')->with(compact('items','courfilieres','tels'));
    }

    public function supprimer($id) {
        $item = Courcycle::find($id);
        $courid = $item->cour_id;
        $cour = Cour::where('id',$courid);
        // dd($courid);
        if (!$item) {
            return redirect('/yeux/cours')->with('error', 'L\'enregistrement n\'a pas été trouvé.');
        }
        $item->delete();
        $cour->delete();
        return redirect('/yeux/cours')->with('success', 'L\'enregistrement a été supprimé avec succès.');
    }

    public function yeux($id){
        $item=Courcycle::Where('id',$id)->firstOrFail();
        $item->yeux=1;
        $item->save();
        return redirect('/yeux/cours');
    }

    public function deyeux($id){
        $item=Courcycle::Where('id',$id)->firstOrFail();
        $item->yeux=0;
        $item->save();
        return redirect('/yeux/cours');
    }

    public function enable($id){
        $item=Courcycle::Where('id',$id)->firstOrFail();
        $item->etat=1;
        $item->save();
        return redirect('/yeux/cours');
    }
    public function desable($id){
        $item=Courcycle::Where('id',$id)->firstOrFail();
        $item->etat=0;
        $item->save();
        return redirect('/yeux/cours');
    }
}
