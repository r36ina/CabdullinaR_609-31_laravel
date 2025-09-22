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
        Schema::create('services_performed', function (Blueprint $table) {
            $table->id();
            $table->string('name_service');
            $table->unsignedBigInteger('medworker_id');
            $table->foreign('name_service')->references('name')->on('services');
            $table->foreign('medworker_id')->references('id')->on('medworker');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_performed');
    }
};
