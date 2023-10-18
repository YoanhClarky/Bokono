<?php

namespace App\Http\Controllers\YeuxController;

use App\Http\Controllers\Controller;
use App\Models\Cour;
use App\Models\Resume;
use App\Models\Tel;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index(){
        $tels = Tel::All();
        $resumes = Resume::simplePaginate(5);
        return view('YeuxOffice.resume')->with(compact('resumes','tels'));
    }

    public function supprimer($id) {
        $resume = Resume::find($id);
        if (!$resume) {
            return redirect('/yeux/resumes')->with('error', 'L\'enregistrement n\'a pas été trouvé.');
        }
        $resume->delete();
        return redirect('/yeux/resumes')->with('success', 'L\'enregistrement a été supprimé avec succès.');
    }

    public function yeux($id){
        $resume=Resume::Where('id',$id)->firstOrFail();
        $resume->yeux=1;
        $resume->save();
        return redirect('/yeux/resumes');
    }

    public function deyeux($id){
        $resume=Resume::Where('id',$id)->firstOrFail();
        $resume->yeux=0;
        $resume->save();
        return redirect('/yeux/resumes');
    }
    
    public function enable($id){
        $resume=Resume::Where('id',$id)->firstOrFail();
        $resume->etat=1;
        $resume->save();
        return redirect('/yeux/resumes');
    }
    public function desable($id){
        $resume=Resume::Where('id',$id)->firstOrFail();
        $resume->etat=0;
        $resume->save();
        return redirect('/yeux/resumes');
    }
}
