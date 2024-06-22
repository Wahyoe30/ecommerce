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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 10, 0);
            $table->timestamps();

            // Menambahkan kunci asing pada kolom `id_order` yang merujuk ke kolom `id_order` di tabel `orders`
            // $table->foreign('id_order')
            //     ->references('id_order')
            //     ->on('orders')
            //     ->onDelete('cascade');

            // // Menambahkan kunci asing pada kolom `id_product` yang merujuk ke kolom `id` di tabel `products`
            // $table->foreignId('id_product')
            //     ->references('id')
            //     ->on('products')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
