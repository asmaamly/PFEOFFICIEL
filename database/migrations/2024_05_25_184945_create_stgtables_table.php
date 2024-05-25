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
        Schema::create('stgtables', function (Blueprint $table) {
            $table->id();
            $table->string('schema')->nullable();
            $table->string('table_name')->nullable();
            $table->string('column_name')->nullable();
            $table->string('mandatory')->nullable();
            $table->string('pk')->nullable();
            $table->string('key_set_name')->nullable();
            $table->string('key_domain_name')->nullable();
            $table->string('code_set_name')->nullable();
            $table->string('code_domain_name')->nullable();
            $table->string('data_type')->nullable();
            $table->string('natural_key')->nullable();
            $table->string('bkey_filter')->nullable();
            $table->string('column_transformation_rule')->nullable();
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
        Schema::dropIfExists('stgtables');
    }
};
