<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Cour;
use App\Models\Courcycle;
use App\Models\Courfiliere;
use App\Models\Tel;
use Illuminate\Http\Request;

class CourCycleController extends Controller
{
    public function recherche(Request $request) {
        $designation = $request->input('designation');

        $items = Courcycle::where('etat', 1)
            ->where('yeux', 1)
            ->whereHas('cour', function ($query) use ($designation) {
                $query->whereRaw("LOWER(designation) LIKE ?", ["%" . strtolower($designation) . "%"]);
            })
            ->orderBy('cycle_id', 'ASC')
            ->get();
    
        $courfilieres = Courfiliere::all();
    
        return view('FrontOffice.Cour.recherche')->with(compact('items', 'courfilieres'));
    }
    
    
    public function index(){
        $items = Courcycle::where('etat',1)->where('yeux',1)->orderBy('cycle_id','ASC')->get(); 
        $courfilieres = Courfiliere::All();
        return view('FrontOffice.cours')->with(compact('items','courfilieres'));
    }
    public function show($token){
        $inf = Courcycle::where('token',$token)->firstOrfail(); 
        //dd($inf);
        return view('FrontOffice.Cour.show')->with(compact('inf'));
    }
    public function telechargercour($id)
    {
        $courcycle = Courcycle::find($id);
    
        if (!$courcycle) {
            abort(404);
        }
        $telechargement = Tel::firstOrCreate([]);
        $telechargement->increment('nbr');
        $timestamp = time();
        $pdfPath = public_path($courcycle->url_pdf);
        $nomFichierTelechargement = $courcycle->cour->designation . " " . $timestamp . ".pdf";
        return response()->download($pdfPath, $nomFichierTelechargement);
    }
}
