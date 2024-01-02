<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\langile;

class Langilea_Controller extends Controller
{
    public function index(){
        $emaitza = langile::all();
        
        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik taula honetan'], 404);
        }
        return response() -> json($emaitza);
    }

    public function erakutsi($id){
        $emaitza = langile::find($id);

        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }
        return response() -> json($emaitza);
    }

    public function gorde(Request $request){
        if(langile::find($request -> input('id'))){
            return response() -> json(['error' => "Badago erregistro bat ID horrekin"], 400);
        }
        
        $langilea = new langile;
        $langilea -> id = $request->input('id');
        $langilea -> izena = $request->input('izena');
        $langilea -> abizena1 = $request->input('abizena1');
        $langilea -> abizena2 = $request->input('abizena2');
        $langilea -> save();

        return response()->json(['mezua' => 'Informazioa ondo gorde da'], 201);
    }

    public function eguneratu(Request $request){
        $langilea = langile::find($request -> input('id'));

        if(!$langilea){
            return response () -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }

        $langilea -> izena = $request->input('izena');
        $langilea -> izena = $request->input('abizena1');
        $langilea -> izena = $request->input('abizena2');
        $langilea -> save();

        return response()->json(['mezua' => 'Informazioa ondo gorde da'], 200);
    }

    public function ezabatu($id){
        $langilea = langile::find($id);

        if(!$langilea){
            return response () -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }

        $langilea -> delete();

        return response() -> json(['mezua' => $id . ' erregistroa ezabatu da'], 200);
    }
}
