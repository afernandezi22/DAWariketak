<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kirolari;

class Kirolari_Controller extends Controller
{
    //
    public function erakutsi(){
        $emaitza = kirolari::all();
        return view('kirolari_bista', compact('emaitza'));
    }
}
