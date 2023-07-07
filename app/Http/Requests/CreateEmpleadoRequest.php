<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'codigo_empleado' => 'required|unique:empleados',
            'name' => 'required|string',
            'apellidos' => 'required|string',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string',
            'nacionalidad' => 'required|string',
            'estado_civil' => 'required|string',
            'tipo_identificacion' => 'required|string',
            'numero_identificacion' => 'required|unique:empleados',
            'numero_seguro_social' => 'required|unique:empleados',
            'numero_telefono' => 'required|unique:empleados',
            'email' => 'required|email|unique:empleados',
            'foto' => 'nullable|string',
            'calle' => 'required|string',
            'numero_calle' => 'required|string',
            'provincia' => 'required|string',
            'municipio' => 'required|string',
            'sector' => 'required|string',
            'localidad' => 'required|string',
            'edificio' => 'nullable|string',
            'numero_apartamento' => 'nullable|string',
            'referencia_ubicacion' => 'required|string',
            'posicione_id' => 'required|exists:posiciones,id',
            'horario_id' => 'required|exists:horarios,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'estado' => 'required|in:activo,inactivo,suspendido,vacaciones,en_licencia,terminado'
        ];
    }
}
