<?php

/**
 * @file DrugTestFactory.php
 *
 * @date 12.11.2021
 *
 */

declare(strict_types=1);

namespace Database\Factories\TestFactory;

use App\Models\Drug;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class DrugTestFactory extends Factory
{
    protected $model = Drug::class;

    public function definition(): array
    {
        $frequency_timers = [
            '1 раз в день' => json_encode(['12:00'], JSON_THROW_ON_ERROR),
            '2 раза в день' => json_encode(['12:10', '13:20'], JSON_THROW_ON_ERROR),
            '3 раза в день' => json_encode(['12:10', '13:20', '14:30'], JSON_THROW_ON_ERROR),
            '4 раза в день' => json_encode(['12:10', '13:20', '14:30', '15:40'], JSON_THROW_ON_ERROR),
        ];

        $randomNumber = random_int(1, 4);
        $randomElementKey = array_rand($frequency_timers);
        $date = Carbon::now();
        $prevWeekDate = $date->clone()->subWeek()->subDays($randomNumber);

        $planned = [
            'До еды',
            'Во время еды',
            'После еды',
            'Перед сном',
        ];

        return [
            'patient_id' => 1,
            'title' => $this->faker->colorName,
            'dosage' => $this->faker->text,
            'frequency' => $randomElementKey,
            'timers' => $frequency_timers[$randomElementKey],
            'planned' => $this->faker->randomElement($planned),
            'start_date' => $prevWeekDate->timestamp,
            'end_date' => $date->clone()->addDays($randomNumber)->endOfDay(),
        ];
    }
}
