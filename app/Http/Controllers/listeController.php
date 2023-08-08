<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Fichier;
use Illuminate\Http\Request;

class listeController extends Controller
{
    public function index(){
        $Annees = Annee::where('etat', 1)->orderBy('designation', 'DESC')->simplePaginate(5);
        return view('layout.app')->with(compact('Annees'));
    }
    public function listepdf($id){
        $Fichiers=Fichier::where('annee_id',$id)->get();
        return view('FrontOffice.Pdf.index')->with(compact('Fichiers'));
    }
}
