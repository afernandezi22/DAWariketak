<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\irakaslea;

class Irakaslea_Controller extends Controller
{
    //
    public function erakutsi(){
        $emaitza = irakaslea::all();
        return view('irakaslea_view', compact('emaitza'));
    }
}
