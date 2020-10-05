<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller{
    public function cargaciudad(){

       $ciudades = Ciudad::all(); 
       return response()->json([
        'status'=>'success',
        'ciudades'=>$ciudades
        ]
    );
    }
}


