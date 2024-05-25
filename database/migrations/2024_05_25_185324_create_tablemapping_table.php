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
        Schema::create('tablemapping', function (Blueprint $table) {
            $table->id();
            $table->string('layer')->nullable();
            $table->string('target_table_name')->nullable();
            $table->string('mapping_name')->nullable();
            $table->string('main_source')->nullable();
            $table->string('main_source_alias')->nullable();
            $table->string('join, 10000')->nullable();
            $table->string('filter_criterion')->nullable();
            $table->string('historization_algorithm')->nullable();
            $table->string('historization_columns')->nullable();
            $table->string('source')->nullable();
            $table->string('remarque')->nullable();
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
        Schema::dropIfExists('tablemapping');
    }
};
