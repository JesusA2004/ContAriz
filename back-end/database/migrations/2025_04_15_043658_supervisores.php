<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::connection('mongodb')->create('supervisores', function (Blueprint $collection) {
            $collection->string('nombreCompleto', 100);
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->drop('supervisores');
    }
    
};
