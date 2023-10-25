<?php

use App\Http\Controllers\ProfileController;
use App\Models\Actualite;
use App\Models\Cycle;
use App\Models\Tel;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Livres
Route::get('/livres','App\Http\Controllers\FrontOffice\LivreController@index');
Route::get('/livres/show/{token}','App\Http\Controllers\FrontOffice\LivreController@show');
Route::get('livre/telecharger/{id}', 'App\Http\Controllers\FrontOffice\LivreController@telechargerlivre');

//Resumes
Route::get('/resumes','App\Http\Controllers\FrontOffice\ResumeController@index');
Route::get('/resumes/show/{token}','App\Http\Controllers\FrontOffice\ResumeController@show');
Route::get('resume/telecharger/{id}', 'App\Http\Controllers\FrontOffice\ResumeController@telechargerresume');


//Cours
Route::get('/cours','App\Http\Controllers\FrontOffice\CourCycleController@index');
Route::get('/cours/show/{token}','App\Http\Controllers\FrontOffice\CourCycleController@show');
Route::get('cour/telecharger/{id}', 'App\Http\Controllers\FrontOffice\CourCycleController@telechargercour');

Route::get('/', function () {
    $actualites = Actualite::where('etat',1)->get();
    $cycles=Cycle::All();
    return view('layout.app')->with(compact('cycles','actualites'));
});
Route::get('/dashboard','App\Http\Controllers\BackOffice\CourController@dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/fichiers/store', 'App\Http\Controllers\BackController@store')->name('fichiers.store');
    //FILIERE
    Route::get('/filieres','App\Http\Controllers\BackOffice\FiliereController@index');
    Route::post('/filiere/create','App\Http\Controllers\BackOffice\FiliereController@create');
    Route::get('/filiere/show/{id}','App\Http\Controllers\BackOffice\FiliereController@show');
    Route::post('/filiere/update/{id}','App\Http\Controllers\BackOffice\FiliereController@update');
    Route::get('/filiere/supprimer/{id}','App\Http\Controllers\BackOffice\FiliereController@yeux');
    Route::get('/filiere/activer/{id}','App\Http\Controllers\BackOffice\FiliereController@enable');
    Route::get('/filiere/desactiver/{id}','App\Http\Controllers\BackOffice\FiliereController@desable');
    //TYPE
    Route::get('/types','App\Http\Controllers\BackOffice\TypeController@index');
    Route::post('/type/create','App\Http\Controllers\BackOffice\TypeController@create');
    Route::get('/type/show/{id}','App\Http\Controllers\BackOffice\TypeController@show');
    Route::post('/type/update/{id}','App\Http\Controllers\BackOffice\TypeController@update');
    Route::get('/type/supprimer/{id}','App\Http\Controllers\BackOffice\TypeController@yeux');
    Route::get('/type/activer/{id}','App\Http\Controllers\BackOffice\TypeController@enable');
    Route::get('/type/desactiver/{id}','App\Http\Controllers\BackOffice\TypeController@desable');
    //CYCLE
    Route::get('/cycles','App\Http\Controllers\BackOffice\CycleController@index');
    Route::post('/cycle/create','App\Http\Controllers\BackOffice\CycleController@create');
    Route::get('/cycle/show/{id}','App\Http\Controllers\BackOffice\CycleController@show');
    Route::post('/cycle/update/{id}','App\Http\Controllers\BackOffice\CycleController@update');
    Route::get('/cycle/supprimer/{id}','App\Http\Controllers\BackOffice\CycleController@yeux');
    Route::get('/cycle/activer/{id}','App\Http\Controllers\BackOffice\CycleController@enable');
    Route::get('/cycle/desactiver/{id}','App\Http\Controllers\BackOffice\CycleController@desable');
    //LIVRE
    Route::get('dashboard/livres','App\Http\Controllers\BackOffice\LivreController@index');
    Route::post('/dashboard/livre/create', 'App\Http\Controllers\BackOffice\LivreController@create')->name('livre.store');
    Route::get('/dashboard/livre/creation', 'App\Http\Controllers\BackOffice\LivreController@creation');
    Route::get('dashboard/livre/show/{token}','App\Http\Controllers\BackOffice\LivreController@show');
    Route::put('dashboard/livre/update/{id}', 'App\Http\Controllers\BackOffice\LivreController@update')->name('livre.update');
    Route::get('dashboard/livre/supprimer/{token}','App\Http\Controllers\BackOffice\LivreController@yeux');
    Route::get('dashboard/livre/activer/{token}','App\Http\Controllers\BackOffice\LivreController@enable');
    Route::get('dashboard/livre/desactiver/{token}','App\Http\Controllers\BackOffice\LivreController@desable');
    //COUR
    Route::get('dashboard/cours','App\Http\Controllers\BackOffice\CourController@index');
    Route::post('/dashboard/cour/create', 'App\Http\Controllers\BackOffice\CourController@store')->name('cour.store');
    Route::get('/dashboard/cour/creation', 'App\Http\Controllers\BackOffice\CourController@creation');
    Route::get('dashboard/cour/show/{token}','App\Http\Controllers\BackOffice\CourController@show');
    Route::put('dashboard/cour/update/{id}','App\Http\Controllers\BackOffice\CourController@update')->name('cour.update');
    Route::get('dashboard/cour/supprimer/{token}','App\Http\Controllers\BackOffice\CourController@yeux');
    Route::get('dashboard/cour/activer/{token}','App\Http\Controllers\BackOffice\CourController@enable');
    Route::get('dashboard/cour/desactiver/{token}','App\Http\Controllers\BackOffice\CourController@desable');
    //RESUME
    Route::get('dashboard/resumes','App\Http\Controllers\BackOffice\ResumeController@index');
    Route::post('/dashboard/resume/create', 'App\Http\Controllers\BackOffice\ResumeController@store')->name('resume.store');
    Route::get('/dashboard/resume/creation', 'App\Http\Controllers\BackOffice\ResumeController@creation');
    Route::get('dashboard/resume/show/{token}','App\Http\Controllers\BackOffice\ResumeController@show');
    Route::put('dashboard/resume/update/{id}','App\Http\Controllers\BackOffice\ResumeController@update')->name('resume.update');
    Route::get('dashboard/resume/supprimer/{token}','App\Http\Controllers\BackOffice\ResumeController@yeux');
    Route::get('dashboard/resume/activer/{token}','App\Http\Controllers\BackOffice\ResumeController@enable');
    Route::get('dashboard/resume/desactiver/{token}','App\Http\Controllers\BackOffice\ResumeController@desable');

    Route::get('/fichier/{id}','App\Http\Controllers\BackController@show');
    Route::get('/enable/{id}','App\Http\Controllers\BackController@enable');
    Route::get('/disable/{id}','App\Http\Controllers\BackController@disable');
    Route::get('/delete/{id}','App\Http\Controllers\BackController@delete');
    Route::delete('/fichiers/{id}', [FichierController::class, 'destroy'])->name('fichiers.destroy');
    Route::get('/fichiers/{fichier}', 'App\Http\Controllers\FichierController@show'); // Remplacez 'show' par le nom de la méthode appropriée
    Route::get('/create', 'App\Http\Controllers\FichierController@create');
});

//ACTUALITES
    Route::get('dashboard/actualites/','App\Http\Controllers\BackOffice\ActualiteController@index');
    Route::post('dashboard/ajouter-actualite','App\Http\Controllers\BackOffice\ActualiteController@create');
Route::get('/yeux', function () {
    $tels = Tel::All();
    return view('YeuxLayout.index')->with(compact('tels'));
});
    Route::get('yeux/resumes/','App\Http\Controllers\YeuxController\ResumeController@index');
    Route::get('yeux/resume/supprimer/{id}','App\Http\Controllers\YeuxController\ResumeController@supprimer');
    Route::get('yeux/resume/yeux/{id}','App\Http\Controllers\YeuxController\ResumeController@yeux');
    Route::get('yeux/resume/deyeux/{id}','App\Http\Controllers\YeuxController\ResumeController@deyeux');
    Route::get('yeux/resume/activer/{id}','App\Http\Controllers\YeuxController\ResumeController@enable');
    Route::get('yeux/resume/desactiver/{id}','App\Http\Controllers\YeuxController\ResumeController@desable');

    Route::get('yeux/livres/','App\Http\Controllers\YeuxController\LivreController@index');
    Route::get('yeux/livre/supprimer/{id}','App\Http\Controllers\YeuxController\LivreController@supprimer');
    Route::get('yeux/livre/yeux/{id}','App\Http\Controllers\YeuxController\LivreController@yeux');
    Route::get('yeux/livre/deyeux/{id}','App\Http\Controllers\YeuxController\LivreController@deyeux');
    Route::get('yeux/livre/activer/{id}','App\Http\Controllers\YeuxController\LivreController@enable');
    Route::get('yeux/livre/desactiver/{id}','App\Http\Controllers\YeuxController\LivreController@desable');

    Route::get('yeux/cours/','App\Http\Controllers\YeuxController\CourController@index');
    Route::get('yeux/cour/supprimer/{id}','App\Http\Controllers\YeuxController\CourController@supprimer');
    Route::get('yeux/cour/yeux/{id}','App\Http\Controllers\YeuxController\CourController@yeux');
    Route::get('yeux/cour/deyeux/{id}','App\Http\Controllers\YeuxController\CourController@deyeux');
    Route::get('yeux/cour/activer/{id}','App\Http\Controllers\YeuxController\CourController@enable');
    Route::get('yeux/cour/desactiver/{id}','App\Http\Controllers\YeuxController\CourController@desable');

require __DIR__.'/auth.php';
