<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class UsuariosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return \response($users);
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'password' => 'required',
            'DNI' => 'required'
        ]);
        $user = User::create($request->all());
        return \response($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $dni
     * @return \Illuminate\Http\Response
     */
    public function show($dni)
    {
        $user = User::findOrFail($dni);
        return \response($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $dni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dni)
    {
        $user = User::findOrFail($dni)->update($request->all());
        return \response($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $dni
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni)
    {
        User::destroy($dni);
        return \response("Usuario eliminado");
    }
}
