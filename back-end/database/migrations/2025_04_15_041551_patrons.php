<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::connection('mongodb')->create('patrons', function (Blueprint $collection) {
            $collection->string('nombre', 120);
            $collection->unique('nombre');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->drop('patrons');
    }
};
