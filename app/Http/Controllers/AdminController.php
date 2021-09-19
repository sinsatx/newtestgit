<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

public function __construct()
{       
       //el middlewaree son los que estan entree la peticion y el controlleer
    $this->middleware('auth');
}



    public function index()
    {
        $var = rand(1,100);
       return view('admin')
       
       
       ->with('numero',$var) // con, para mandar datos a la vista
       ->with('color','#FFF'); // con, para mandar datos a la vista
    }
}
