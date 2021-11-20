<?php

use App\Http\Controllers\AuthControlador;
use App\Http\Controllers\PermisoAutrisaControlador;
use App\Http\Controllers\PermisoMTCControlador;
use App\Http\Controllers\PermisoTranspMercanciaControlador;
use App\Http\Controllers\SoatControlador;
use App\Http\Controllers\UsuariosControlador;
use App\Http\Controllers\VehiculoControlador;
use App\Http\Resources\VehicleResource;
use App\Models\Vehiculo;
use App\Models\User;
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
/*Ruta de prueba, solo utilizar cuando se quiere probar el funcionamiento de algo*/

Route::get('/test', function () {
    if (User::find('72178959')->gerente_general) {
        return 'Si es gerente';
    } else {
        return 'No es gerente';
    }
});

/*Autenticacion*/
Route::post('/login', [AuthControlador::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**Rutas autenticadas */
// Route::get('/vehicles_and_permissions', function () {
//     return VehicleResource::collection(Vehiculo::all());
// })->middleware('auth:sanctum');

// Route::apiResource('vehicles', VehiculoControlador::class)->middleware('auth:sanctum');
// Route::apiResource('vehicles.permiso_autrisa', PermisoAutrisaControlador::class)->shallow()->middleware('auth:sanctum');
// Route::apiResource('vehicles.permiso_mtc', PermisoMTCControlador::class)->shallow()->middleware('auth:sanctum');
// Route::apiResource('vehicles.soat', SoatControlador::class)->shallow()->middleware('auth:sanctum');
// Route::apiResource('vehicles.permiso_transp_mercancia', PermisoTranspMercanciaControlador::class)->shallow()->middleware('auth:sanctum');

// Route::apiResource('users', UsuariosControlador::class)->middleware('auth:sanctum');

/**Rutas sin autenticación */
Route::get('/vehicles_and_permissions', function () {
    return VehicleResource::collection(Vehiculo::all());
});

Route::apiResource('vehicles', VehiculoControlador::class);
Route::apiResource('vehicles.permiso_autrisa', PermisoAutrisaControlador::class)->shallow();
Route::apiResource('vehicles.permiso_mtc', PermisoMTCControlador::class)->shallow();
Route::apiResource('vehicles.soat', SoatControlador::class)->shallow();
Route::apiResource('vehicles.permiso_transp_mercancia', PermisoTranspMercanciaControlador::class)->shallow();

Route::apiResource('users', UsuariosControlador::class);
