<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
use App\Models\Vehiculo;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //if (Auth::user()->admin_logistica) {
        $request->validate([
            'placa' => 'required|string|min:7|max:7',
            'anho' => 'required|numeric',
            'tipo' => 'required',
            'unidad' => 'required',
            'usuario' => 'required'
        ]);

        $vehicle = Vehiculo::create($request->all());
        return \response($vehicle);
        // }

        // return response()->json([
        //     "message" => "unauthorized access"
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $placa
     * @return \Illuminate\Http\Response
     */
    public function show($placa)
    {
        //if (Auth::user()->admin_logistica) {
        $vehicle = Vehiculo::findOrFail($placa);
        return \response($vehicle);
        // }

        // return response()->json([
        //     'message' => 'unauthorized access'
        // ]);
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
        //if (Auth::user()->admin_logistica) {
        $vehicle = Vehiculo::findOrFail($placa)->update($request->all());
        return \response($vehicle);
        //}

        // return response()->json([
        //     'message' => 'unauthorized access'
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($placa)
    {
        if (Auth::user()->admin_logistica) {
            Vehiculo::destroy($placa);
            return \response('Vehiculo eliminado de la base de datos');
        }

        return response()->json([
            'message' => 'unauthorized access'
        ]);
    }
}
