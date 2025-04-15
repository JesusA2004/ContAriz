<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::connection('mongodb')->create('empresa_facturacions', function (Blueprint $collection) {
            $collection->string('nombre', 120);
            // Referencia a la Plaza
            $collection->string('plaza_id'); // O: ->objectId('plaza_id')
            $collection->index('plaza_id');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->drop('empresa_facturacions');
    }
};
