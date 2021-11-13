<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehiculo::all();
        return \response($vehicles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required',
            'anho' => 'required',
            'tipo' => 'required',
            'unidad' => 'required',
            'usuario' => 'required'
        ]);

        $vehicle = Vehiculo::create($request->all());
        return \response($vehicle);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $placa
     * @return \Illuminate\Http\Response
     */
    public function show($placa)
    {
        $vehicle = Vehiculo::findOrFail($placa);
        return \response($vehicle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $placa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $placa)
    {
        $vehicle = Vehiculo::findOrFail($placa)->update($request->all());
        return \response($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($placa)
    {
        Vehiculo::destroy($placa);
        return \response('Vehiculo eliminado de la base de datos');
    }

    public function permiso_autrisa($id)
    {
        $vehicle = Vehiculo::findOrFail($id);
        return \response($vehicle->PermisoAutrisa());
    }
}
