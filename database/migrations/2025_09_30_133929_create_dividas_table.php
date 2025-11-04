<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dividas', function (Blueprint $table) {
            $table->id('iddivida');
            $table->decimal('valor', 10, 2);
            $table->string('nomecliente', 45);
            $table->unsignedBigInteger('venda_idvenda');
            $table->enum('status_divida', ['pago', 'pendente'])->default('pendente');
            $table->date('data_limite')->nullable();
            $table->timestamps();

            $table->foreign('venda_idvenda')->references('idvenda')->on('vendas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dividas');
    }
};