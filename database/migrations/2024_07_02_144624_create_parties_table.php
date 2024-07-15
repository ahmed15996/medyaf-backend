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
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('name');
            $table->string('img');
            $table->date('date');
            $table->time('time');
            $table->boolean('qr_code')->default(0);
            $table->double('lat')->nullable()->default(0);
            $table->double('lng')->nullable()->default(0);
            $table->string('location')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->integer('attendance_confirmed')->default(0);
            $table->integer('scanned')->default(0);
            $table->integer('msg')->default(0);
            $table->integer('waiting')->default(0);
            $table->integer('transmission_failure')->default(0);
            $table->integer('apology')->default(0);
            $table->integer('not_sent')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
