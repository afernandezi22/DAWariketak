<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beharrak;

class Beharrak_Controller extends Controller
{
    //
    public function index(){
        $emaitza = beharrak::all();
        return response() -> json($emaitza);
    }

    public function erakutsi($id){
        $emaitza = beharrak::find($id);
        if(!$emaitza){
            return response()->json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }
        return response() -> json($emaitza);
    }

    // public function erakutsi(Request $request){
    //     $id = $request->query('erakutsi');

    //     if ($id) {
    //         $emaitza = Beharrak::find($id);

    //         if ($emaitza) {
    //             return response()->json($emaitza);
    //         } else {
    //             return response()->json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
    //         }
    //     } else {
    //         return response()->json(['error' => 'Parametroa falta da kontsultan'], 400);
    //     }
    // }

    public function gorde(Request $aux){
        if(beharrak::find($aux -> input('id'))){
            return response() -> json(['error' => "Badago erregistro bat ID horrekin"], 400);
        }
        
        $beharra = new beharrak;
        $beharra -> id = $aux->input('id');
        $beharra -> izena = $aux->input('izena');
        $beharra -> deskribapena = $aux->input('deskribapena');
        $beharra -> save();

        return response()->json(['mezua' => 'Informazioa ondo gorde da'], 201);
    }

    public function eguneratu(Request $aux){
        $beharra = beharrak::find($aux->input('id'));

        if(!$beharra){
            return response() -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }

        $beharra -> izena = $aux -> input('izena');
        $beharra -> deskribapena = $aux -> input('deskribapena');
        $beharra -> save();

        return response() -> json(['mezua' => 'Erregistroa ondo eguneratu da'], 200);
    }

    public function ezabatu($id){
        $beharra = beharrak::find($id);

        if(!$beharra){
            return response() -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }

        $beharra -> delete();

        return response() -> json(['mezua' => 'Erregistroa ondo ezabatu da'], 200);
    }
}
