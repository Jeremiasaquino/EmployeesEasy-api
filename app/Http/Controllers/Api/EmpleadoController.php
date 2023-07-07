<?php

namespace App\Http\Controllers\Api;

use App\Models\Empleados;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CreateEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;

class EmpleadoController extends Controller
{
    /**
     * Obtiene la lista de empleados.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $empleados = Empleados::all();

        if ($empleados->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No hay empleados registrados'], 404);
        }

        return response()->json(['success' => true, 'message' => 'Empleados registrados', 'empleados' => $empleados]);
    }

    /**
     * Crea un nuevo empleado.
     *
     * @param  \App\Http\Requests\CreateEmpleadoRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateEmpleadoRequest $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        // Generar el código de empleado
        $codigoEmpleado = 'EMP-' . str_pad(Empleados::count() + 1, 4, '0', STR_PAD_LEFT);

        // Asignar el código de empleado al formulario
        $request->merge(['codigo_empleado' => $codigoEmpleado]);

        // Crear el nuevo empleado
        $empleado = Empleados::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => $empleado,
            'message' => 'Empleado creado exitosamente.'
        ], 201);
    }

    /**
     * Obtiene los detalles de un empleado específico.
     *
     * @param  \App\Models\Empleados  $empleado
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Empleados $empleado)
    {
        return response()->json([
            'success' => true,
            'data' => $empleado
        ]);
    }

    /**
     * Actualiza los datos de un empleado específico.
     *
     * @param  \App\Http\Requests\UpdateEmpleadoRequest  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateEmpleadoRequest $request, Empleados $empleado)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        // Actualizar los datos del empleado, excepto el campo 'codigo_empleado'
        $empleado->update($request->except('codigo_empleado'));

        // Actualizar los datos del empleado
        $empleado->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $empleado,
            'message' => 'Empleado actualizado exitosamente.'
        ]);
    }

    /**
     * Elimina un empleado específico.
     *
     * @param  \App\Models\Empleados  $empleado
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Empleados $empleado)
    {
        $empleado->delete();

        return response()->json([
            'success' => true,
            'message' => 'Empleado eliminado exitosamente.'
        ]);
    }
}
