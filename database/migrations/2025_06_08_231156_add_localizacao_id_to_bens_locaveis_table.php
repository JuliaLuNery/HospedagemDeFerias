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

            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('localizacao_id')->constrained('localizacoes')->after('id');
            $table->unsignedBigInteger('localizacao_id')->after('id');

            $table->foreign('localizacao_id')->references('id')->on('localizacoes')->onDelete('cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bens_locaveis', function (Blueprint $table) {

            $table->dropForeign(['localizacao_id']);
            $table->dropColumn('localizacao_id');
        });
    }
};
