<?php

namespace App\Http\Controllers;

use App\Models\Courcycle;
use App\Models\Livre;
use App\Models\Resume;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $term = $request->input('searchTerm');

    $livres = Livre::where('titre', 'like', "%$term%")
        ->orWhere('auteur', 'like', "%$term%")
        ->orWhere('soustitre', 'like', "%$term%")
        ->orWhere('edition', 'like', "%$term%")
        ->orWhere('lieupub', 'like', "%$term%")
        ->orWhere('maisoned', 'like', "%$term%")
        ->orWhere('datepub', 'like', "%$term%")
        ->orWhere('page', 'like', "%$term%")
        ->get();

    $cours = Courcycle::whereHas('cour', function ($query) use ($term) {
        $query->where('designation', 'like', "%$term%")
            ->orWhere('description', 'like', "%$term%");
    })
    ->get();

    $resumes = Resume::where('designation', 'like', "%$term%")
        ->get();

    return view('index', compact('livres', 'cours', 'resumes'));
}

}
