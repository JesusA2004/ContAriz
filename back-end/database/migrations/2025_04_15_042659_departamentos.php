<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::connection('mongodb')->create('departamentos', function (Blueprint $collection) {
            $collection->string('nombre', 120);
            // Referencia a la EmpresaFacturacion
            $collection->string('empresa_facturacion_id'); // O ->objectId('empresa_facturacion_id')
            $collection->index('empresa_facturacion_id');
            // Opcional: Puedes almacenar otros datos relevantes, por ejemplo, la fecha de inicio
            $collection->date('fecha_inicio')->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->drop('departamentos');
    }
};
