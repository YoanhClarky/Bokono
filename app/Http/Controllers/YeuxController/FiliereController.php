<?php

namespace App\Http\Controllers\YeuxController;

use App\Http\Controllers\Controller;
use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index(){
        $filieres=Filiere::where('yeux',1)->OrderBy('updated_at','desc')->get();
        return view('BackOffice.filieres.index')->with(compact('filieres'));
    }

    public function create(Request $request){
        $filiere = Filiere::create([
            'designation'=> $request->designation,
            'code'=> $request->code,
        ]);
        $filiere->save();
        return redirect('/filieres');
    }

    public function show($id){
        $filiere=Filiere::where('id',$id)->firstOrfail();
        return view('BackOffice.filieres.show')->with(compact('filiere'));
    }
    public function update(Request $request, $id) {
        $filiere = Filiere::findOrFail($id);
        $filiere->designation = $request->designation;
        $filiere->code = $request->code;
        $filiere->save();
        return redirect('/filieres');
    }
    public function yeux($id){
        $filiere=Filiere::Find($id);
        $filiere->yeux=0;
        $filiere->save();
        return redirect('/filieres');
    }
    public function enable($id){
        $filiere=Filiere::Find($id);
        $filiere->etat=1;
        $filiere->save();
        return redirect('/filieres');
    }
    public function desable($id){
        $filiere=Filiere::Find($id);
        $filiere->etat=0;
        $filiere->save();
        return redirect('/filieres');
    }
}
