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
        Schema::create('bmapvalues', function (Blueprint $table) {
            $table->id();
            $table->string('layer')->nullable();
            $table->string('code_set_name')->nullable();
            $table->string('code_domain_id')->nullable();
            $table->string('edw_code')->nullable();
            $table->string('source_code')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('bmapvalues');
    }
};
