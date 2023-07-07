<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function obtenerDatosUsuarioAutenticado(Request $request)
    {
        // Comprueba si el usuario está autenticado
        if (Auth::check()) {
            // Obtiene los datos del usuario autenticado
            $user = Auth::user();

            // Procesamiento adicional con los datos del usuario
            $usuario = $user;
            // $nombreCompleto = $user->nme . ' ' . $user->name;
            // Obtener el token
            $token = $request->bearerToken();
            // $roles = $usuario->Role()->pluck('name');

            // Devuelve una respuesta con los datos del usuario y el procesamiento adicional
            return response()->json([
                'status' => 'success',
                'message' => 'Datos del usuario obtenidos correctamente',
                'data' => [
                    'usuario' => $user,
                    // 'roles' => $roles,
                    'token' => $token,
                    // Agrega aquí más propiedades o transformaciones necesarias
                ],

            ]);
        } else {
            // Devuelve una respuesta si el usuario no está autenticado
            return response()->json([
                'status' => 'error',
                'message' => 'El usuario no está autenticado',

            ], 401);
        }
    }
}
