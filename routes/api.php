<?php

use App\Http\Controllers\CiudadController;
use App\Http\Controllers\CooperativaController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [UsersController::class, 'login']); //PANTALLA 4
Route::post('create', [UsersController::class, 'create']);//PANTALLA 5
Route::get('ciudades', [CiudadController::class, 'cargaciudad']);//PANTALLA 1
Route::get('cooperativas', [CooperativaController::class, 'cargarcoop']);//PANTALLA 2
Route::get('cooperativa/{id}', [CooperativaController::class, 'getCoop']);//PANTALLA 3
// Supongamos que quieres proteger esta ruta, es decir, que sólo ingrese cuando llegue un user_id en la cabecera
//Route::middleware(['autorizacion'])->get('misboletos', [UsersController::class, 'create']);

// Listo, ya está protegida. Pero esta protección es solo para los que no están registrados, o sea,
//Todos los usuarios de la BD pueden acceder?, pues se protege mientras no hayas "inciado sesión ", ya que al iniciar sesión te devuelve el usuario y ahí está el id
// Te pongo un ejemplo, yo inicio sesión
// Esto me retorna el usuario y ese tiene el id, ese id tienes que guardarlo localmente, puede ser con sqlite

// lUEGO, Supongamos que quieras acceder a boletos, la ruta boletos para ver tus boletos
// Ahi no le he enviado ni una cabecera, peor el user_id
// Me está retornando el mensaje de que no está autorizado
// Pero si le envío la cabecera

// no funcionó :v

// SI quieres agrupar las rutas, por ejemplo que un grupo de rutas tenga ese middleware sin poner a c/u, poner
/*Route::middleware(['autorizacion'])->group(static function(){
    // Así agrupas rutas y todas estas rutas están con las reglas del route->group
    Route::get('misboletos', [UsersController::class, 'create']);
    Route::get('jenny', [UsersController::class, 'create']);
    
});*/

// Te botará error ya que el método que ejecuto es create y está creando un usaurio, pero no le envío los datos
// ahí te acomodas con las rutas, sus controladores y métodos
// DUDAS? Si
// Por qué para el middleware usaste GET?, porque se me dio la gana JAjajajajaja PENDEJO
// Es que fue así xdxdxd
// Pude usar 
// get => obtener datos, 
// post => guardar datos, 
// put, patch,  => los dos son para actualizar

// delete, método de eliminación
// Alguna otra? No, GRACIAS, cuál gracias? :v .l.xd chao, voy a seguir undiendome en mi depre Jajaja descansa