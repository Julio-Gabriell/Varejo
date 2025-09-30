<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id('idproduto');
            $table->string('nome', 100);
            $table->decimal('valorvenda', 10, 2);
            $table->decimal('valorcompra', 10, 2);
            $table->float('precokg');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('produtos');
    }
};
