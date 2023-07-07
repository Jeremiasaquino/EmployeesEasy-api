<?php

namespace App\Models;

use App\Models\Empleados;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posiciones extends Model
{
    use HasFactory;
    protected $table = 'posiciones';
    protected $fillable = ['name'];

    public function empleado()
    {
        return $this->hasMany(Empleados::class);
    }
}
