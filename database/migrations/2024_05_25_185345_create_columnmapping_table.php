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
        Schema::create('columnmapping', function (Blueprint $table) {
            $table->id();
            $table->string('layer')->nullable();
            $table->string('mapping_name')->nullable();
            $table->string('column_name')->nullable();
            $table->string('mapped_to_table')->nullable();
            $table->string('mapped_to_column')->nullable();
            $table->string('transformation_type')->nullable();
            $table->string('transformation_rule, 1000')->nullable();
            $table->string('colonne')->nullable();
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
        Schema::dropIfExists('columnmapping');
    }
};
