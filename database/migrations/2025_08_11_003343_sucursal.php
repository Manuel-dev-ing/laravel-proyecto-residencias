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
        Schema::create('sucursales', function(Blueprint $table){
            $table->id();
            $table->string('name', length:100);
            $table->string('phone_number', length:100);
            $table->integer('number');
            $table->string('street', length:100);
            $table->string('neighborhood', length:100);
            $table->string('city', length:100);
            $table->integer('status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
