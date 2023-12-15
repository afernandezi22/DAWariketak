<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ikaslea;

class Ikaslea_Controller extends Controller
{
    //
    public function erakutsi(){
        $emaitza = ikaslea::all();
        return view('ikaslea_view', compact('emaitza'));
    }
}
