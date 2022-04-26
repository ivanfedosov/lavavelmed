<?php

/**
 * @file DrugsTableSeeder.php
 * MonitoringListResource
 * @date 20.05.2021
 *
 */

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DrugsTableSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 10) as $item) {
            \App\Models\Drug::factory()->create();
        }
    }
}
