<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        $types=Type::where('yeux',1)->OrderBy('updated_at','desc')->get();
        return view('BackOffice.types.index')->with(compact('types'));
    }

    public function create(Request $request){
        $type = Type::create([
            'designation'=> $request->designation,
        ]);
        $type->save();
        return redirect('/types');
    }

    public function show($id){
        $type=Type::where('id',$id)->firstOrfail();
        return view('BackOffice.types.show')->with(compact('type'));
    }
    public function update(Request $request, $id) {
        $type = Type::findOrFail($id);
        $type->designation = $request->designation;
        $type->save();
        return redirect('/types');
    }
    public function yeux($id){
        $type=Type::Find($id);
        $type->yeux=0;
        $type->save();
        return redirect('/types');
    }
    public function enable($id){
        $type=Type::Find($id);
        $type->etat=1;
        $type->save();
        return redirect('/types');
    }
    public function desable($id){
        $type=Type::Find($id);
        $type->etat=0;
        $type->save();
        return redirect('/types');
    }

}
