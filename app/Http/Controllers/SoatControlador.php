<?php

namespace App\Http\Controllers;

use App\Models\Soat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoatControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($placa)
    {
        $permiso = Soat::findOrFail($placa);
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
        if (Auth::user()->admin_logistica) {
            $request->validate([
                'fecha_renovacion' => 'required',
                'fecha_venc' => 'required'
            ]);

            $permiso = Soat::create($request->all() + ["placa" => $placa]);
            return \response($permiso);
        }
        return response()->json([
            'message' => 'unauthorized request'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        if (Auth::user()->admin_logistica) {
            $permiso = Soat::findOrFail($placa)->update($request->all());
            return \response($permiso);
        }
        return response()->json([
            'message' => 'unauthorized request'
        ]);
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
