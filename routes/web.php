<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\listeController@index');
Route::get('/liste/{id}','App\Http\Controllers\listeController@listepdf');
Route::get('/telecharger/{id}', 'App\Http\Controllers\TeleController@telecharger');


Route::get('/dashboards','App\Http\Controllers\BackController@listepdf')->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/fichiers/store', 'App\Http\Controllers\BackController@store')->name('fichiers.store');
    Route::get('/fichier/{id}','App\Http\Controllers\BackController@show');
    Route::get('/enable/{id}','App\Http\Controllers\BackController@enable');
    Route::get('/disable/{id}','App\Http\Controllers\BackController@disable');
    Route::get('/delete/{id}','App\Http\Controllers\BackController@delete');
    Route::delete('/fichiers/{id}', [FichierController::class, 'destroy'])->name('fichiers.destroy');
    Route::get('/fichiers/{fichier}', 'App\Http\Controllers\FichierController@show'); // Remplacez 'show' par le nom de la méthode appropriée
    Route::get('/create', 'App\Http\Controllers\FichierController@create');
});

require __DIR__.'/auth.php';
