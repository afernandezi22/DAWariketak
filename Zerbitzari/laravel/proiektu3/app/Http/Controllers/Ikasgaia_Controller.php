<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ikasgaia;

class Ikasgaia_Controller extends Controller
{
    //
    public function erakutsi(){
        $emaitza = ikasgaia::all();
        return view('ikasgaia_view', compact('emaitza'));
    }
}
