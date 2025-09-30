<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produto_fornecedor', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_idproduto');
            $table->unsignedBigInteger('fornecedor_idfornecedor');

            $table->foreign('produto_idproduto')->references('idproduto')->on('produtos')->onDelete('cascade');
            $table->foreign('fornecedor_idfornecedor')->references('idfornecedor')->on('fornecedores')->onDelete('cascade');

            $table->primary(['produto_idproduto', 'fornecedor_idfornecedor']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('produto_fornecedor');
    }
};
