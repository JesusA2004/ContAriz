<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::connection('mongodb')->create('prima_vacacionales', function (Blueprint $collection) {
            $collection->string('descripcion', 100);
            $collection->float('saldo');
            $collection->date('fecha');
            $collection->string('empleado_id');
            $collection->index('empleado_id');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->drop('prima_vacacionales');
    }
};
