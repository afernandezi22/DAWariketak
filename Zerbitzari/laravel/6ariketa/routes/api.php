<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Beharrak_Controller;

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

Route::get('/beharrak', [Beharrak_Controller::class, 'index']);

Route::get('/beharrak/{id}', [Beharrak_Controller::class, 'erakutsi']);

Route::post('/beharrak', [Beharrak_Controller::class, 'gorde']);

Route::put('/beharrak', [Beharrak_Controller::class, 'eguneratu']);

Route::delete('/beharrak/{id}', [Beharrak_Controller::class, 'ezabatu']);