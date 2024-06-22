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
        Schema::create('payments', function (Blueprint $table) {
            // $table->increments('id_payment');
            $table->id();
            $table->foreignId('id_order')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
            $table->decimal('amount', 10, 0);
            $table->string('method', 50);
            $table->enum('status', ['Processed','Completed']);
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
