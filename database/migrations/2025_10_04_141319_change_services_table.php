<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE `services` DROP PRIMARY KEY');
        DB::statement('ALTER TABLE `services` ADD `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`)');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE `services` DROP COLUMN `id`');
        DB::statement('ALTER TABLE `services` ADD PRIMARY KEY (`id`)'); // Замените на старое имя ключа, если помните его
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};
