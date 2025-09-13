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
        Schema::table('incidences', function (Blueprint $table) {

            // Crear la foreign key hacia users(id)
                $table->foreign('assigned_user')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incidences', function (Blueprint $table) {
            $table->dropForeign(['assigned_user']);
        });
    }
};
