<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\langilea;

class Langilea_Controller extends Controller
{
    public function getAll(){
        $emaitza = langilea::all();
        
        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik taula honetan'], 404);
        }
        return response() -> json($emaitza);
    }

    public function getById($id){
        $emaitza = langilea::find($id);

        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }
        return response() -> json($emaitza);
    }

    public function post(Request $request){
        if(langilea::find($request -> input('id'))){
            return response() -> json(['error' => "Badago erregistro bat ID horrekin"], 400);
        }
        
        $langilea = new langilea;
        $langilea -> id = $request->input('id');
        $langilea -> izena = $request->input('izena');
        $langilea -> izena = $request->input('abizena1');
        $langilea -> izena = $request->input('abizena2');
        $langilea -> save();

        return response()->json(['mezua' => 'Informazioa ondo gorde da'], 201);
    }

    public function put(Request $request){
        $langilea = langilea::find($request -> input('id'));

        if(!$langilea){
            return response () -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }

        $langilea -> izena = $request->input('izena');
        $langilea -> izena = $request->input('abizena1');
        $langilea -> izena = $request->input('abizena2');
        $langilea -> save();

        return response()->json(['mezua' => 'Informazioa ondo gorde da'], 200);
    }

    public function delete($id){
        $langilea = langilea::find($id);

        if(!$langilea){
            return response () -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }

        $langilea -> delete();

        return response() -> json(['mezua' => $id . ' erregistroa ezabatu da'], 200);
    }
}
