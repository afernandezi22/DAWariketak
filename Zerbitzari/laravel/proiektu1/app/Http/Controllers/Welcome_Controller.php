<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcome_Controller extends Controller
{
    //
    public function welcome(){
        return view('welcome');
    }

    public function ikasleak(){
        return view('ikasleak');
    }
}
