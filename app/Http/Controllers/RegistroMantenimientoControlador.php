<?php

/**CU-10,11,12 Crear Actualizar y Editar Registros de Mantenimiento  */

namespace App\Http\Controllers;

use App\Http\Resources\RegistroMantenimientoResource;
use App\Models\DetalleMantenimiento;
use App\Models\ObservacionMantenimiento;
use App\Models\RegistroMantenimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegistroMantenimientoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($placa)
    {
        $registros_mantenimiento = RegistroMantenimiento::where('placa_vehiculo', $placa)->get();

        return RegistroMantenimientoResource::collection($registros_mantenimiento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $placa
     * @return \Illuminate\Http\Response
     */
    public function store($placa, Request $request)
    {
        if (Auth::user()->admin_logistica) {
            $request->validate([
                'fecha_emision' => 'required|date',
                'fecha_salida' => 'required|date',
                'nombre_taller' => 'required|string',
                'km_actual' => 'integer',
                'nro_factura' => 'required|string',
                'nro_proforma' => 'string'
            ]);

            $registro = RegistroMantenimiento::create($request->all() + [
                'placa_vehiculo' => $placa
            ]);

            $items_registro = $request->input('detalle');

            foreach ($items_registro as $item) {
                $detalle = DetalleMantenimiento::create([
                    'id_registro' => $registro->id,
                    'descripcion' => $item['descripcion'],
                    'monto' => $item['monto']
                ]);
            }

            $items_observaciones = $request->input('observaciones');

            foreach ($items_observaciones as $item) {
                $detalle = ObservacionMantenimiento::create([
                    'id_registro' => $registro->id,
                    'descripcion' => $item['descripcion']
                ]);
            }

            return \response($registro);
        } else {
            return  response()->json([
                "message" => "unauthorized access"
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $placa, $id)
    {
        $request->validate([
            'fecha_emision' => 'date',
            'fecha_salida' => 'date',
            'nombre_taller' => 'string',
            'km_actual' => 'integer',
            'nro_factura' => 'string',
            'nro_proforma' => 'string'
        ]);

        $registro = RegistroMantenimiento::findOrFail($id)->update($request->all());

        $items_registro = $request->input('detalle');

        $detalles_borrados = DetalleMantenimiento::where('id_registro', $id)->delete();

        foreach ($items_registro as $item) {
            $detalle = DetalleMantenimiento::create([
                'id_registro' => $id,
                'descripcion' => $item['descripcion'],
                'monto' => $item['monto']
            ]);
        }

        $items_observaciones = $request->input('observaciones');

        $observaciones_borrados = ObservacionMantenimiento::where('id_registro', $id)->delete();

        foreach ($items_observaciones as $item) {
            $detalle = ObservacionMantenimiento::create([
                'id_registro' => $id,
                'descripcion' => $item['descripcion']
            ]);
        }

        return \response($registro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
