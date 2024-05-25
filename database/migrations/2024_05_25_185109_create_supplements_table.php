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
        Schema::create('supplements', function (Blueprint $table) {
            $table->id();
            $table->string('reserved_words')->nullable();
            $table->string('reserved_words_source')->nullable();
            $table->string('validation_comment')->nullable();
            $table->string('filename')->nullable();
            $table->datetime('imported_at')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplements');
    }
};
