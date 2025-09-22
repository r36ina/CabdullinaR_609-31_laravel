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
        Schema::table('users', function (Blueprint $table)
        {
            $table->renameColumn('name', 'first_name');
            $table->string('last_name');
            $table->string('passport_num')->unique();
            $table->string('phone');
            $table->unsignedTinyInteger('is_admin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table)
        {
            $table->renameColumn('first_name', 'name');
            $table->dropColumn('last_name');
            $table->dropColumn('passport_num');
            $table->dropColumn('phone');
            $table->dropColumn('is_admin');
        });
    }
};
