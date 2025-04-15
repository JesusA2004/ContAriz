<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::connection('mongodb')->create('cuenta_bancarias', function (Blueprint $collection) {
            $collection->string('cuentaBancaria', 50);
            $collection->string('tarjeta', 16)->nullable();
            $collection->string('clabeI', 18)->nullable();
            $collection->string('nombreBanco', 100);
            // Referencia al empleado
            $collection->string('empleado_id');
            $collection->index('empleado_id');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->drop('cuenta_bancarias');
    }
};
