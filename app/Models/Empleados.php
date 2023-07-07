<?php

namespace App\Models;

use App\Models\Horarios;
use App\Models\Posiciones;
use App\Models\Departamentos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleados extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'codigo_empleado',
        'name',
        'apellidos',
        'edad',
        'fecha_nacimiento',
        'genero',
        'nacionalidad',
        'estado_civil',
        'tipo_identificacion',
        'numero_identificacion',
        'numero_seguro_social',
        'numero_telefono',
        'email',
        'foto',
        'calle',
        'numero_calle',
        'provincia',
        'municipio',
        'sector',
        'localidad',
        'edificio',
        'numero_apartamento',
        'referencia_ubicacion',
        'posicione_id',
        'horario_id',
        'departamento_id',
        'estado'
    ];

    public function posicione()
    {
        return $this->belongsTo(Posiciones::class, 'posicione_id');
    }

    public function horario()
    {
        return $this->belongsTo(Horarios::class, 'horario_id');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamentos::class, 'departamento_id');
    }
}
