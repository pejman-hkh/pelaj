<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    function index( Request $request ) {
        $path = $request->getPathInfo();
        
    }
}
