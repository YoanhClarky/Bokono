<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ActualiteController extends Controller
{

public function index(){
    $actualites = Actualite::orderBy('created_at','ASC')->get();
    return view("BackOffice/actualites/index")->with(compact('actualites'));
}


public function create(Request $request) {
    // Validez les données du formulaire
    $request->validate([
        'titre' => 'required|string',
        'ddate' => 'required|date',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'contenu' => 'required|string',
    ]);

    // Gérez l'ajout de l'image
    $data = $request->except('img');
    $file = $request->img;
    $ext = $file->getClientOriginalExtension();
    $allowedExtensions = ['png', 'jpg', 'gif', 'jpeg'];

    if (!file_exists(public_path('img/actualites'))) {
        mkdir(public_path('img/actualites'));
    }

    if (in_array($ext, $allowedExtensions)) {
        $name_with_extension = time() . '.' . $ext;
        $file->move(public_path('img/actualites'), $name_with_extension);
        $data['img'] = 'img/actualites/' . $name_with_extension;
    }

    // Créez une nouvelle actualité
    Actualite::updateOrCreate(['id' => $request->id], $data);

    // Redirigez vers la page appropriée
    return redirect()->back();
}



}
