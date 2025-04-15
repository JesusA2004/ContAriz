<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::connection('mongodb')->create('empleados', function (Blueprint $collection) {
            $collection->string('nombre', 50);
            $collection->string('apellidoP', 50);
            $collection->string('apellidoM', 50);
            $collection->string('imss', 50);
            $collection->string('registroPatronal', 50);
            $collection->integer('cp');
            $collection->string('nss', 50);
            $collection->string('rfc', 50);
            $collection->string('curp', 50);
            $collection->date('fechaAltaImss')->nullable();
            $collection->float('sdi')->nullable();
            $collection->string('estado', 50);
            $collection->float('creditoInfonavit')->nullable();
            $collection->date('fechaIngreso')->nullable();
            $collection->date('fechaAguinaldo')->nullable();
            $collection->integer('estatus')->default(1);
            // Referencia a un Departamento: puede ser solo el id...
            $collection->string('departamento_id');
            $collection->index('departamento_id');
            // ... y/o embebe datos del Departamento (opcional)
            $collection->json('departamento_info')->nullable();
            // Ejemplo de departamento_info: { "id": "XXX", "nombre": "Ventas", "fecha_inicio": "2025-01-01", "empresa": "Empresa X" }
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->drop('empleados');
    }
};
