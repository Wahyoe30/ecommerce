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
        Schema::create('myfavorites', function (Blueprint $table) {
            // $table->increments('id_myfavorite');
            $table->id();
            $table->foreignId('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreignId('id_product')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->timestamps();
            
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myfavorites');
    }
};
