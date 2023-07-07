<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_empleado')->unique();
            $table->string('name');
            $table->string('apellidos');
            $table->string('edad');
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('nacionalidad');
            $table->string('estado_civil');
            $table->string('tipo_identificacion');
            $table->string('numero_identificacion')->unique();
            $table->string('numero_seguro_social')->unique();
            $table->string('numero_telefono')->unique();
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->string('calle'); //c/elcilia pepin 89, santo domnigo, mendoza, mendoza 2, santo domingo este
            $table->string('numero_calle');
            $table->string('provincia');
            $table->string('municipio');
            $table->string('sector');
            $table->string('localidad');
            $table->string('edificio')->nullable();
            $table->string('numero_apartamento')->nullable();
            $table->string('referencia_ubicacion');
            $table->unsignedBigInteger('posicione_id');
            $table->foreign('posicione_id')->references('id')->on('posiciones')->onDelete('cascade');
            $table->unsignedBigInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('cascade');
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->enum('estado', ['activo', 'inactivo', 'suspendido', 'vacaciones', 'en_licencia', 'terminado'])->default('activo');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
