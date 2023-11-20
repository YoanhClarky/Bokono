<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('yeux/livres/','App\Http\Controllers\YeuxController\api\LivreController@index');
Route::get('yeux/cours/','App\Http\Controllers\YeuxController\api\CourController@index');
Route::get('yeux/resumes/','App\Http\Controllers\YeuxController\api\ResumeController@index');