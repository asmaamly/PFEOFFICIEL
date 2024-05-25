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
        Schema::create('coretables', function (Blueprint $table) {
            $table->id();
            $table->string('table_name')->nullable();
            $table->string('column_name')->nullable();
            $table->string('data_type')->nullable();
            $table->string('mandatory')->nullable();
            $table->string('pk')->nullable();
            $table->string('historization_key')->nullable();
            $table->string('is_lookup')->nullable();
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
        Schema::dropIfExists('coretables');
    }
};
