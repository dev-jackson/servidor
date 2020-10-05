<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Cooperativa;
use Illuminate\Http\Request;

class CooperativaController extends Controller{

    /**
     * Obtener coopeativas
     * @param $request
     */
    public function cargarcoop(Request $request){
        $ciudad = $request->input('ciudad_id');
        //dd($ciudad);
        $ciudades = Cooperativa::where('id_ciudad',$ciudad)->get();

        return response()->json($ciudades);
    }
    public function getCoop($id){
        
        $cooperativa = Cooperativa::where('id', $id)
            ->with('rutascoop')
            ->with('rutascoop.rutas')
            ->with('horarioscoop')
            ->with('horarioscoop.horarios')
            ->first();
        
            if($cooperativa==null){
                return response()->json([
                    'status'=>'error',
                    'mensaje'=>'cooperativa no encontrada'
                ], 404);
            }
            return response()->json([
                'status'=>'success',
                'cooperativa'=>$cooperativa
            ]);
    }
}