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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('imagem')->nullable(false);
            $table->string('nome', 80)->nullable(false);
            $table->string('telefone', 11)->nullable(false);
            $table->string('endereco', 240)->nullable(false);
            $table->string('email', 120)->nullable(false);
            $table->string('password', 25)->nullable(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};