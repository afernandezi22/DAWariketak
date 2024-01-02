<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\langile_animalia;

class LangileAnimalia_Controller extends Controller
{
    public function index(){
        $emaitza = langile_animalia::all();
        
        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik taula honetan'], 404);
        }
        return response() -> json($emaitza, 200);
    }

    public function erakutsi($idAnimalia, $idLangile){
        $emaitza = langile_animalia::where('id_animalia', $idAnimalia)->where('id_langile', $idLangile)->first();

        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik id horiekin'], 404);
        }

        return response() -> json($emaitza, 200);
    }

    public function gorde(Request $request){
        if(langile_animalia::where('id_animalia', $request->input('id_animalia'))->where('id_langile', $request->input('id_langile'))->where('eguna', $request->input('eguna'))->first()){
            return response()->json(['error' => "Badago erregistro bat ID horiekin"], 400);
        }        
        
        $langile_animalia = new langile_animalia;
        $langile_animalia -> id_animalia = $request->input('id_animalia');
        $langile_animalia -> id_langile = $request->input('id_langile');
        $langile_animalia -> eguna = $request -> input('eguna');
        $langile_animalia -> save();

        return response()->json(['mezua' => 'Informazioa ondo gorde da'], 201);
    }

    // Ez dauka zentzurik eguneratzea 3 zutabeak PK badira
    public function eguneratu(Request $request){
        $id_animalia = $request->input('id_animalia');
        $id_langile = $request->input('id_langile');
        $eguna = $request -> input('eguna');
    
        $eguneratuta = langile_animalia::where([
            'id_animalia' => $id_animalia,
            'id_langile' => $id_langile,
        ])->update([
            'eguna' => $request->input('eguna'),
        ]);
    
        if ($eguneratuta) {
            return response()->json(['mezua' => 'Informazioa ondo eguneratu da'], 200);
        } else {
            return response()->json(['error' => 'Ez dago erregistrorik id horiekin'], 404);
        }
    }


    public function ezabatu(Request $request){
        $id_animalia = $request->input('id_animalia');
        $id_langile = $request->input('id_langile');
        $eguna = $request -> input('eguna');
    
        $ezabatu = langile_animalia::where([
            'id_animalia' => $id_animalia,
            'id_langile' => $id_langile,
            'eguna' => $eguna
        ])->delete();

        if ($ezabatu) {
            return response()->json(['mezua' => 'Informazioa ondo ezabatu da'], 200);
        } else {
            return response()->json(['error' => 'Ez dago erregistrorik id horiekin'], 404);
        }
    }
}
