<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Animalia_Controller;
use App\Http\Controllers\Langilea_Controller;
use App\Http\Controllers\LangileAnimalia_Controller;

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

//==============================================================================>
// ANIMALIAK
//==============================================================================>
Route::get('/animaliak', [Animalia_Controller::class, 'index']);
Route::get('/animaliak/{id}', [Animalia_Controller::class, 'erakutsi']);
Route::post('/animaliak', [Animalia_Controller::class, 'gorde']);
Route::put('/animaliak', [Animalia_Controller::class, 'eguneratu']);
Route::delete('/animaliak/{id}', [Animalia_Controller::class, 'ezabatu']);

//==============================================================================>
// LANGILEAK
//==============================================================================>
Route::get('/langileak', [Langilea_Controller::class, 'index']);
Route::get('/langileak/{id}', [Langilea_Controller::class, 'erakutsi']);
Route::post('/langileak', [Langilea_Controller::class, 'gorde']);
Route::put('/langileak', [Langilea_Controller::class, 'eguneratu']);
Route::delete('/langileak/{id}', [Langilea_Controller::class, 'ezabatu']);

//==============================================================================>
// LANGILE_ANIMALIA
//==============================================================================>
Route::get('/langile_animalia', [LangileAnimalia_Controller::class, 'index']);
Route::get('/langile_animalia/{idLangile}/{idAnimalia}', [LangileAnimalia_Controller::class, 'erakutsi']);
Route::post('/langile_animalia', [LangileAnimalia_Controller::class, 'gorde']);
Route::put('/langile_animalia', [LangileAnimalia_Controller::class, 'eguneratu']);
Route::delete('/langile_animalia', [LangileAnimalia_Controller::class, 'ezabatu']);