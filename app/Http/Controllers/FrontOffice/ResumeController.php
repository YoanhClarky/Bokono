<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\Tel;
use Illuminate\Http\Request;

class ResumeController extends Controller
{

    public function recherche(Request $request) {
        $designation = $request->input('designation');
        
        
        $resumes = Resume::where('etat', 1)
            ->where('yeux', 1)
            ->whereRaw("LOWER(designation) LIKE ?", ["%" . strtolower($designation) . "%"])
            ->paginate(5);
    
        return view('FrontOffice.Resume.recherche', compact('resumes'));
    }
    
    


    public function index(){
        $resumes = resume::where('etat',1)->where('yeux',1)->paginate(5); 
        return view('FrontOffice.resumes')->with(compact('resumes'));
    }

    public function show($token){
        $resume = Resume::where('token',$token)->firstOrfail();
        return view('FrontOffice.Resume.show')->with(compact('resume'));
    }
    public function telechargerresume($id)
    {
        $resume = resume::find($id);
    
        if (!$resume) {
            abort(404);
        }
        $telechargement = Tel::firstOrCreate([]); 
        $telechargement->increment('nbr');
        $timestamp = time();

        $pdfPath = public_path($resume->url_pdf);
        $nomFichierTelechargement = $resume->designation . " " . $timestamp . ".pdf";
        return response()->download($pdfPath, $nomFichierTelechargement);
    }
}
