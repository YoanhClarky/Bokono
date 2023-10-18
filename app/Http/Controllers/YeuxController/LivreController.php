<?php

namespace App\Http\Controllers\YeuxController;

use App\Http\Controllers\Controller;
use App\Models\Livre;
use App\Models\Tel;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index(){
        $tels = Tel::All();
        $livres = Livre::simplePaginate(5);
        return view('YeuxOffice.livre')->with(compact('livres','tels'));
    }

    public function supprimer($id) {
        $livre = Livre::find($id);
        if (!$livre) {
            return redirect('/yeux/livres')->with('error', 'L\'enregistrement n\'a pas été trouvé.');
        }
        $livre->delete();
        return redirect('/yeux/livres')->with('success', 'L\'enregistrement a été supprimé avec succès.');
    }

    public function yeux($id){
        $livre=Livre::Where('id',$id)->firstOrFail();
        $livre->yeux=1;
        $livre->save();
        return redirect('/yeux/livres');
    }

    public function deyeux($id){
        $livre=Livre::Where('id',$id)->firstOrFail();
        $livre->yeux=0;
        $livre->save();
        return redirect('/yeux/livres');
    }
    
    public function enable($id){
        $livre=Livre::Where('id',$id)->firstOrFail();
        $livre->etat=1;
        $livre->save();
        return redirect('/yeux/livres');
    }
    public function desable($id){
        $livre=Livre::Where('id',$id)->firstOrFail();
        $livre->etat=0;
        $livre->save();
        return redirect('/yeux/livres');
    }

}
