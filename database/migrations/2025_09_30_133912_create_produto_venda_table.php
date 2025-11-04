<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produto_venda', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_idproduto');
            $table->unsignedBigInteger('venda_idvenda');
            $table->decimal('qtd_venda_kg', 10, 3)->nullable();

            $table->foreign('produto_idproduto')
                ->references('idproduto')
                ->on('produtos')
                ->onDelete('cascade');

            $table->foreign('venda_idvenda')
                ->references('idvenda')
                ->on('vendas')
                ->onDelete('cascade');

            $table->primary(['produto_idproduto', 'venda_idvenda']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('produto_venda');
    }
};