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
        Schema::create('datatype', function (Blueprint $table) {
            $table->id();
            $table->string('source_data_type')->nullable();
            $table->string('ok_flg')->nullable();
            $table->string('column1')->nullable();
            $table->string('column2')->nullable();
            $table->string('teradata_data_type')->nullable();
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
        Schema::dropIfExists('datatype');
    }
};
