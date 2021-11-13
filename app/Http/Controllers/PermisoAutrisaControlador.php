<?php

namespace App\Http\Controllers;

use App\Models\PermisoAutrisa;
use Illuminate\Http\Request;

class PermisoAutrisaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($placa)
    {
        $permiso = PermisoAutrisa::findOrFail($placa);
        return \response($permiso);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($placa, Request $request)
    {
        $request->validate([
            'fecha_emision' => 'required',
            'fecha_venc' => 'required'
        ]);

        $permiso = PermisoAutrisa::create($request->all() + ["placa" => $placa]);
        return \response($permiso);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $placa
     * @return \Illuminate\Http\Response
     */
    public function show($placa)
    {
        $permiso = PermisoAutrisa::findOrFail($placa);
        return \response($permiso);
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
        $permiso = PermisoAutrisa::findOrFail($placa)->update($request->all());
        return \response($permiso);
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
