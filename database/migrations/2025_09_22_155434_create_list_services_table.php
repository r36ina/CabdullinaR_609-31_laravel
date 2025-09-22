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
        Schema::create('list_services', function (Blueprint $table) {
            $table->id();
            $table->string('contract_number');
            $table->foreign('contract_number')->references('contract_number')->on('contract');
            $table->string('name_service');
            $table->foreign('name_service')->references('name')->on('services');
            $table->unsignedInteger('contract_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_services');
    }
};
