<?php

use App\Http\Controllers\AuthControlador;
use App\Http\Controllers\PermisoAutrisaControlador;
use App\Http\Controllers\PermisoMTCControlador;
use App\Http\Controllers\PermisoTranspMercanciaControlador;
use App\Http\Controllers\RegistroMantenimientoControlador;
use App\Http\Controllers\SoatControlador;
use App\Http\Controllers\UsuariosControlador;
use App\Http\Controllers\VehiculoControlador;
use App\Http\Resources\VehicleResource;
use App\Mail\AutrisaVencido;
use App\Mail\MTCVencido;
use App\Mail\PermisoTranspMercVencido;
use App\Mail\PermisoVencido;
use App\Mail\SOATVencido;
use App\Models\Admin_Logistica;
use App\Models\PermisoAutrisa;
use App\Models\PermisoMTC;
use App\Models\PermisoTranspMercancia;
use App\Models\RegistroMantenimiento;
use App\Models\Soat;
use App\Models\Vehiculo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
    // $admins = Admin_Logistica::all();

    // foreach ($admins as $admin) {
    //     $user = User::where('DNI', $admin->DNI)->first();
    //     $permisos_autrisa = PermisoAutrisa::where('fecha_venc', Date('Y-m-d', strtotime('+' . $admin->dias_vencimiento . ' days')))->get();
    //     foreach ($permisos_autrisa as $permiso) {
    //         Mail::to($user->email)->send(new AutrisaVencido($permiso));
    //         Mail::to('sandro.caceres@ucsp.edu.pe')->send(new AutrisaVencido($permiso));
    //     }

    //     $permisos_mtc = PermisoMTC::where('fecha_venc', Date('Y-m-d', strtotime('+' . $admin->dias_vencimiento . ' days')))->get();
    //     foreach ($permisos_mtc as $permiso) {
    //         Mail::to('sandro.caceres@ucsp.edu.pe')->send(new MTCVencido($permiso));
    //         Mail::to($user->email)->send(new AutrisaVencido($permiso));
    //     }

    //     $permisos_tm = PermisoTranspMercancia::where('fecha_venc', Date('Y-m-d', strtotime('+' . $admin->dias_vencimiento . ' days')))->get();
    //     foreach ($permisos_tm as $permiso) {
    //         Mail::to('sandro.caceres@ucsp.edu.pe')->send(new PermisoTranspMercVencido($permiso));
    //         Mail::to($user->email)->send(new AutrisaVencido($permiso));
    //     }

    //     $soats = Soat::where('fecha_venc', Date('Y-m-d', strtotime('+' . $admin->dias_vencimiento . ' days')))->get();
    //     foreach ($soats as $permiso) {
    //         Mail::to('sandro.caceres@ucsp.edu.pe')->send(new SOATVencido($permiso));
    //         Mail::to($user->email)->send(new AutrisaVencido($permiso));
    //     }
    // }
    // return 'Email Enviado';
    return 'All good';
});

/*Autenticacion*/
Route::post('/login', [AuthControlador::class, 'login']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vehicles_and_permissions', function () {
    return VehicleResource::collection(Vehiculo::all());
})->middleware('auth:sanctum');

Route::post('/notice_date', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    $admin = Admin_Logistica::where('DNI', $user->DNI)->update(['dias_vencimiento' => $request->dias_vencimiento]);
    return \response($admin);
})->middleware('auth:sanctum');

Route::apiResource('vehicles', VehiculoControlador::class)->middleware('auth:sanctum');
Route::apiResource('vehicles.permiso_autrisa', PermisoAutrisaControlador::class)->shallow()->middleware('auth:sanctum');
Route::apiResource('vehicles.permiso_mtc', PermisoMTCControlador::class)->shallow()->middleware('auth:sanctum');
Route::apiResource('vehicles.soat', SoatControlador::class)->shallow()->middleware('auth:sanctum');
Route::apiResource('vehicles.permiso_transp_mercancia', PermisoTranspMercanciaControlador::class)->shallow()->middleware('auth:sanctum');

Route::apiResource('users', UsuariosControlador::class)->middleware('auth:sanctum');
Route::apiResource('vehicles.registros_mantenimiento', RegistroMantenimientoControlador::class)->middleware('auth:sanctum');
