<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE `contract` DROP PRIMARY KEY');
        DB::statement('ALTER TABLE `contract` ADD `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`)');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE `contract` DROP COLUMN `id`');
        DB::statement('ALTER TABLE `contract` ADD PRIMARY KEY (`contract_number`)');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};
