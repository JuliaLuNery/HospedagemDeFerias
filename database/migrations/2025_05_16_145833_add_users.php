<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sobrenome')->nullable()->after('name');
            $table->string('nif')->unique()->after('email');
            $table->string('telefone')->nullable()->after('nif');
            $table->date('morada')->nullable()->after('telefone');
            $table->text('data_nascimento')->nullable()->after('morada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn([
                'sobrenome','telefone', 'nif', 'data_nascimento', 'morada'
            ]);
        });
    }
};
