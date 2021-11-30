<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControlador extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'datos de login invalidos'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $roles = [];
        if ($user->gerente_general) {
            array_push($roles, 'gerente_general');
        }
        if ($user->gerente_tecnico) {
            array_push($roles, 'gerente_tecnico');
        }
        if ($user->admin_logistica) {
            array_push($roles, 'admin_logistica');
        }
        if ($user->operador) {
            array_push($roles, 'operador');
        }


        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'roles' => $roles
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    }
}
