<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Paso 1: Agregar la nueva columna
        Schema::table('payments', function (Blueprint $table) {
            $table->string('new_payment_method')->nullable();
        });

        // Paso 2: Migrar datos si es necesario
        DB::table('payments')->update([
            'new_payment_method' => DB::raw('payment_method')
        ]);

        // Paso 3: Eliminar la columna antigua
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('payment_method');
        });

        // Paso 4: Renombrar la nueva columna
        Schema::table('payments', function (Blueprint $table) {
            $table->renameColumn('new_payment_method', 'payment_method');
        });
    }

    public function down()
    {
        // Paso 1: Agregar la columna antigua
        Schema::table('payments', function (Blueprint $table) {
            $table->enum('old_payment_method', ['credit_card', 'cash', 'bank_transfer'])->nullable(false);
        });

        // Paso 2: Migrar datos si es necesario
        DB::table('payments')->update([
            'old_payment_method' => DB::raw('payment_method')
        ]);

        // Paso 3: Eliminar la columna nueva
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('payment_method');
        });

        // Paso 4: Renombrar la columna antigua
        Schema::table('payments', function (Blueprint $table) {
            $table->renameColumn('old_payment_method', 'payment_method');
        });
    }
};