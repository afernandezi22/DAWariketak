<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\animalia;

class Animalia_Controller extends Controller
{
    public function index(){
        $emaitza = animalia::all();
        
        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik taula honetan'], 404);
        }
        return response() -> json($emaitza);
    }

    public function erakutsi($id){
        $emaitza = animalia::find($id);

        if(!$emaitza){
            return response () -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }
        return response() -> json($emaitza);
    }

    public function gorde(Request $request){
        if(animalia::find($request -> input('id'))){
            return response() -> json(['error' => "Badago erregistro bat ID horrekin"], 400);
        }
        
        $animalia = new animalia;
        $animalia -> id = $request->input('id');
        $animalia -> izena = $request->input('izena');
        $animalia -> izen_zientifikoa = $request->input('izen_zientifikoa');
        $animalia -> pisua = $request->input('pisua');
        $animalia -> tamaina = $request -> input('tamaina');
        $animalia -> save();

        return response()->json(['mezua' => 'Informazioa ondo gorde da'], 201);
    }

    public function eguneratu(Request $request){
        $animalia = animalia::find($request -> input('id'));

        if(!$animalia){
            return response () -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }

        $animalia -> izena = $request->input('izena');
        $animalia -> izen_zientifikoa = $request->input('izen_zientifikoa');
        $animalia -> pisua = $request->input('pisua');
        $animalia -> tamaina = $request -> input('tamaina');
        $animalia -> save();

        return response()->json(['mezua' => 'Informazioa ondo gorde da'], 200);
    }

    public function ezabatu($id){
        $animalia = animalia::find($id);

        if(!$animalia){
            return response () -> json(['error' => 'Ez dago erregistrorik id horrekin'], 404);
        }

        $animalia -> delete();

        return response() -> json(['mezua' => $id . ' erregistroa ezabatu da'], 200);
    }
}