<?php

/**
 * @file DatabaseSeeder.php
 * MonitoringListResource
 * @date 18.03.2021
 *
 */

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BmiValuesTableSeeder::class);
        $this->call(DrugsTableSeeder::class);
    }
}
