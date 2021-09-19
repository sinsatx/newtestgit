<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function __construct()
    {       
           //el middlewaree son los que estan entree la peticion y el controlleer
        $this->middleware('auth');
    }
    

    public function index($id)
    {
        return "profile" .$id;
    }
}
