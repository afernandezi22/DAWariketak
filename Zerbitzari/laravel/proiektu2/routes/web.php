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

Route::get('ikasleak/adina/{adina}', function ($adina) {
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
    
    
    return view('ikasleak', ['ikasleak' => $ikasleak, 'adina' => $adina]);
})->where('adina', '[0-150]');

Route::get('ikasgaiak', function () {
    $ikasgaiak = [
        'Programazioa' => 200,
        'Web Garapena' => 160,
        'Datubaseen Diseinua' => 120,
        'Sare Administrazioa' => 140,
        'Web Aplikazioen Garapena' => 180,
        'Entornu Garapena' => 120,
        'Erabilgarritasun Teknikoak eta Ondareak' => 60,
        'Informatika Konpetentzia Laborategia' => 120,
        'Proiektua' => 40,
    ];
    
    return view('ikasgaiak', ['ikasgaiak' => $ikasgaiak]);
});

Route::get('ikasgaiak/iragazkia/{letra}', function ($letra) {
    $ikasgaiak = [
        'Programazioa' => 200,
        'Web Garapena' => 160,
        'Datubaseen Diseinua' => 120,
        'Sare Administrazioa' => 140,
        'Web Aplikazioen Garapena' => 180,
        'Entornu Garapena' => 120,
        'Erabilgarritasun Teknikoak eta Ondareak' => 60,
        'Informatika Konpetentzia Laborategia' => 120,
        'Proiektua' => 40,
    ];

    return view('ikasgaiak', ['ikasgaiak' => $ikasgaiak, 'letra' => $letra]);
})->where('letra', '[a-z,A-Z]');;

Route::get('irakasleak', function () {
    return view('irakasleak');
});

Route::get('gelak/id/{id}', function ($id) {
    return view('gelak', ['id' => $id]);
})->where('id', '[0-9]+');