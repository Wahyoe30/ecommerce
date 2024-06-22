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
        Schema::create('orders', function (Blueprint $table) {
            // $table->increments('id_order');
            $table->id();
            $table->foreignId('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->decimal('total_amount', 10, 0);
            $table->enum('status', ['Pending', 'Processed', 'Delivered', 'Cancelled']);
            $table->timestamps();


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
