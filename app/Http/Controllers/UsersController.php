<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function login(Request $request)
    {
        $usuario = $request->input('usuario');
        $pasword = $request->input('password');
        $user = User::where('nombre',$usuario)->where('password',$pasword)->first();
        

        if($user==null){
            return response()->json([
                'status'=>'error',
                'mensaje'=>'credenciales incorrectas'
            ], 404);
        }
        return response()->json([
            'status'=>'success',
            'user'=>$user
        ]);

    }

    public function create(Request $request){
       
        $user= User::create([
            'nombre' => $request->input('nombre'),          
            'fecha_nac' => $request->input('fechanac'), 
            'ncelular'=>$request->input('celular'),
            'id_ciudad'=>$request->input('Ciudad'),
            'password'=>$request->input('password')
           ]);
          return response()->json([
              'status'=>'success',
              'user'=> $user
          ]);
    }
    
}
// AHORA TE MOSTRARÉ LOS MIDDELWARE, SABES QUÉ SON? nel
// OH MIERDA :´V
// En laravel y otros frameworks es una capa que se ejecuta antes del controlador, sirve para valir ciertas cosas
// Ahora vamos a validar que exista un id (el del usuario), esto nos sirve por si queremos que ciertas RUTAS estén protegidas
// eS DECIR, QUE SÓLO SE PUEDA ENTRAR A ESE CONTROLADOR O EJECUTAR LA ACCIÓN SIEMPRE Y CUANDO SE LE ENVÍE UN ID
// ENTENDIDO? Sí, pero entonces el proyecto tendrá doble validación de usuario? Porque con el if que te mostré ya valida
// Esa es la aprte del front, por lo general se valida en los dos lados Perfect
// Anota esto, en la consola de comandos ejecutas php artisan make:middleware TuMidelware
// Ahora, ese middleware lo puedes ver dentro de la carpeta
/*$user = User::find($id);
if($user != null)[]
$user = User::find($id);
if($user != null){
  $user->update([
    'campo'=>'x',
     'c22'  => 'y'
  ]);
}*/
