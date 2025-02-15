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
        Schema::create('party_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id')->references('id')->on('parties')->cascadeOnDelete();
            $table->string('phone');
            $table->string('sur_name');
            $table->string('name');
            $table->integer('count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('party_users');
    }
};
