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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('tipo', ['user', 'admin', 'super']);
            $table->rememberToken();
            $table->string('cpf')->nullable();
            $table->enum('genero', [
                'masculino',
                'feminino',
                'nao_informado'
            ])->nullable();
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
            $table->integer('pne')->nullable();
            $table->string('descricao_pne')->nullable();
            $table->string('nome_certificado')->nullable();
            $table->string('codigo')->nullable();
            $table->string('img_profile')
                ->nullable();
            $table->string('google_id')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
