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
        Schema::table('bens_locaveis', function (Blueprint $table) {
            if (!Schema::hasColumn('bens_locaveis', 'localizacao_id')) {
                $table->integer('localizacoes_id')->after('id');
                $table->foreignId('localizacoes_id')->references('id')->on('localizacoes')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bens_locaveis', function (Blueprint $table) {
            //
        });
    }
};
