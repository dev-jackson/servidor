<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UsersController;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AutorizacionMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Ya, este método (handle) se ejecuta al instante, en este método vamos a obtener el id del usaurio
        // Este id se lo envía desde el front, pero no como parámetro post ni get, sino por la cabecera
        $id = $request->header('Authorization');// ya que tenemos el objeto de Request, obtenemos ele valor de la cabecera de esta manera
        //obtener id; El id no debe ser como está en la bd? si, por eso, ahora vas a hacer una consulta a la bd su existe ese dato
        // Si no existe envías una respuesta negativa, si existe pues no hagas nada
        //  Luego validamos si ese id existe en la bd
        //este user_id de donde sale?
        // De la cabecera que envía el front entonces no está declarado con ese nombre? Pues, tu app tiene que enviar ese dato con ese nombre
        //entonces ese es el nombre por defecto? No, tú defines el nombre, si querías le hubieses llamado Authorization
        //donde defini el nombre? Si, en la cabecerea, imagino que en flutter cuadno haces una petición http, puedes enviar cabeceras-> header 
        //Mi pregunta es donde está definido user_id, no existe, tú la envías en las cabeceras F
        // Es más o menos como enviabas usuario y password para iniciar sesión Ya envio una cabecera en flutter, ajá, bueno, entonces eso sigue? 
        //Agregar ese campo?
        // Pues primero valida que ese id pertenezca a algún usuario en la BD, con el modelo User
        // Aquí :v
        // Nel
        // Por alguna razón sólo se puede enviar cabeceras que existan, no se puede enviar una
        // La más conocida es Authorization, que envía un token, pero aquí le vamos a envia el id
        // Alguna duda? El dd() es para imprimir?, detiene la ejecución e imprime objetos
        // Es bien práctico

        $user = User::find($id);
        // dd($user);
        // El id 0 no existe en la bd, alguna duda? No, ta bonito xd
        // Bueno, así proteges las rutas que necesitas, ah
        if($user == null){
            return response()->json([
                'status'=>'error',
                'mensaje'=>'No autorizado'
            ], 401);
        }
        
        // Eso es todo, el método find devuelve un usuario o null (dependiendo el id que envío) Okay
        // Ahora, vamos a registrar este middleware, en Kernel.php dentro dde
        // Si no existe, le enviamos una respuesta de 401, con un mensaje de no autorizado

        // Caso contrario dejamos pasar, comprendido?
        
        return $next($request);// Este método hace un continue al controlador 
    }
}
