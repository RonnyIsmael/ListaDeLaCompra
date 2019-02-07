<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function getHome()
    {
        return redirect()->action('ProductoController@getIndex');
    }

}
