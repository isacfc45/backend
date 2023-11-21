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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nome_certificado')->nullable();
            $table->string('cpf')->nullable();
            $table->string('telefone')->nullable();
            $table->string('endereco')->nullable();
            $table->enum('formacao', [
                'Ensino Fundamental',
                'Ensino Médio',
                'Tecnico',
                'Superior',
                'Pós Graduação - Lato Sensu',
                'Pós Graduação - Stricto Sensu - Mestrado',
                'Pós Graduação - Stricto Sensu - Doutorado',
                'Pós Doutorado'
            ])->nullable();
            $table->string('img_profile')->nullable();
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
