<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('ikasleak', function () {
    $ikasleak = [
        ['izena' => 'Ane', 'adina' => 20],
        ['izena' => 'Unai', 'adina' => 22],
        ['izena' => 'Maite', 'adina' => 19],
        ['izena' => 'Gorka', 'adina' => 21],
        ['izena' => 'Leire', 'adina' => 23],
        ['izena' => 'Iker', 'adina' => 20],
        ['izena' => 'Amaia', 'adina' => 21],
        ['izena' => 'Eneko', 'adina' => 22],
        ['izena' => 'Ainhoa', 'adina' => 19],
        ['izena' => 'Jon', 'adina' => 23],
    ];

    
    return view('ikasleak', ['ikasleak' => $ikasleak]);
});

Route::get('irakasleak', function () {
    return view('irakasleak');
});

Route::get('ikasgaiak', function () {
    return view('ikasgaiak');
});

Route::get('gelak/id/{id}', function ($id) {
    return view('gelak', ['id' => $id]);
})->where('id', '[0-9]+');