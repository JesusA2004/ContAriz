<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::connection('mongodb')->create('historial_quincenas', function (Blueprint $collection) {
            $collection->integer('quincena');
            $collection->date('fecha');
            $collection->string('empleado_id');
            $collection->index('empleado_id');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->drop('historial_quincenas');
    }
};
