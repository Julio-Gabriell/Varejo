<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id('idvenda');
            $table->date('data');
            $table->float('precototal');
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->integer('quantidade')->nullable();

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('forma_pagamento_id')->nullable();
            $table->foreign('forma_pagamento_id')
                ->references('idforma_pagamento')
                ->on('forma_pagamento')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('vendas');
    }
};