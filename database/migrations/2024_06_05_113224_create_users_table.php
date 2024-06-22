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
        Schema::create('users', function (Blueprint $table) {
            // $table->bigIncrements('id_user');
            $table->id();
            $table->string('fullname', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('phone', 255);
            $table->string('address', 255);
            $table->enum('role', ['Admin', 'Costumer']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};