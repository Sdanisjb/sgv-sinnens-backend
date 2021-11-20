<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        // if (Auth::user()->gerente_general) {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
            'DNI' => 'required|string|min:8|max:8'
        ]);

        $request['password'] = Hash::make($request['password']);

        $user = User::create($request->all());

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
        // }

        // return response()->json([
        //     'message' => 'unauthorized'
        // ]);
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
        // if (Auth::user()->gerente_general) {
        User::destroy($dni);
        return \response("Usuario eliminado");
        // }

        // return response()->json([
        //     'message' => 'unauthorized access'
        // ]);
    }
}
