<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::connection('mongodb')->create('plazas', function (Blueprint $collection) {
            $collection->string('nombre', 120);
            // Guardamos la referencia del Patron (se puede almacenar como ObjectId o string)
            $collection->string('patron_id');
            // Índice para consultas
            $collection->index('patron_id');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->drop('plazas');
    }
};
