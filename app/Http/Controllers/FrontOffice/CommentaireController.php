<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function create(Request $request){
        $commentaire = Commentaire::create([
            'nom'=> $request->nom,
            'contenu'=> $request->contenu,
        ]);
        $commentaire->save();
        return redirect('/');
    }
}
