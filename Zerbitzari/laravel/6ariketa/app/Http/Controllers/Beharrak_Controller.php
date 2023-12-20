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

    // public function erakutsi($id){
    //     $emaitza = beharrak::find($id);
    //     return response() -> json($emaitza);
    // }

    public function erakutsi(Request $request){
        $id = $request->query('erakutsi');

        if ($id) {
            $emaitza = Beharrak::find($id);

            if ($emaitza) {
                return response()->json($emaitza);
            } else {
                return response()->json(['error' => 'No se encontró el registro'], 404);
            }
        } else {
            return response()->json(['error' => 'Parámetro no proporcionado en la consulta'], 400);
        }
    }

    public function gorde(Request $aux){
        
    }

    public function eguneratu(Request $aux){
    
    }

    public function ezabatu($id){
    
    }
}
