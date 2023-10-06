<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Cycle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CycleController extends Controller
{
    public function index(){
        $cycles=Cycle::where('yeux',1)->OrderBy('updated_at','desc')->get();
        return view('BackOffice.cycles.index')->with(compact('cycles'));
    }

    public function create(Request $request){
        $cycle = Cycle::create([
            'designation'=> $request->designation,
            'code'=> $request->code,
        ]);
        $cycle->save();
        return redirect('/cycles');
    }

    public function show($id){
        $cycle=Cycle::where('id',$id)->firstOrfail();
        return view('BackOffice.cycles.show')->with(compact('cycle'));
    }
    public function update(Request $request, $id) {
        $cycle = Cycle::findOrFail($id);
        $cycle->designation = $request->designation;
        $cycle->code = $request->code;
        $cycle->save();
        return redirect('/cycles');
    }
    public function yeux($id){
        $cycle=Cycle::Find($id);
        $cycle->yeux=0;
        $cycle->save();
        return redirect('/cycles');
    }
    public function enable($id){
        $cycle=Cycle::Find($id);
        $cycle->etat=1;
        $cycle->save();
        return redirect('/cycles');
    }
    public function desable($id){
        $cycle=Cycle::Find($id);
        $cycle->etat=0;
        $cycle->save();
        return redirect('/cycles');
    } 
}
