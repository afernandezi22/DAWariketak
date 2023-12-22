<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\langile_animalia;

class LangileAnimalia_Controller extends Controller
{
    public function getAll(){
        $emaitza = langile_animalia::all();
        
        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik taula honetan'], 404);
        }
        return response() -> json($emaitza, 200);
    }

    public function getById($idAnimalia, $idLangilea){
        $emaitza = langile_animalia::where('id_animalia', $idAnimalia)->where('id_langilea', $idLangilea)->first();

        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik id horiekin'], 404);
        }

        return response() -> json($emaitza, 200);
    }

    public function post(Request $request){
        if(langile_animalia::where('id_animalia', $request -> input('id_animalia')->where('id_langilea', $request -> input('id_langilea'))->first())){
            return response() -> json(['error' => "Badago erregistro bat ID horiekin"], 400);
        }
        
        $langile_animalia = new langile_animalia;
        $langile_animalia -> id_animalia = $request->input('id_animalia');
        $langile_animalia -> id_langilea = $request->input('id_langilea');
        $langile_animalia -> save();

        return response()->json(['mezua' => 'Informazioa ondo gorde da'], 201);
    }

    public function put(Request $request){
        $animalia = animalia::find($request -> input('id'));

        if(!$animalia){
            return response () -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }

        $animalia -> izena = $request->input('izena');
        $animalia -> save();

        return response()->json(['mezua' => 'Informazioa ondo gorde da'], 200);
    }

    public function delete($idAnimalia, $idLangilea){
        $emaitza = langile_animalia::where('id_animalia', $idAnimalia)->where('id_langilea', $idLangilea)->first();

        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik id horiekin'], 404);
        }

        $emaitza -> delete();

        return response() -> json(['mezua' => 'Erregistroa ezabatu da'], 200);
    }
}
