<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id('idfornecedor');
            $table->string('nome', 80);
            $table->string('CNPJ', 18)->unique();
            $table->string('telefone', 15)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('fornecedores');
    }
};
