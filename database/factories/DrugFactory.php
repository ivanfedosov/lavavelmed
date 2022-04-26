<?php

/**
 * @file DrugFactory.php
 * MonitoringListResource
 * @date 20.05.2021
 *
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Drug;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DrugFactory extends Factory
{
    protected $model = Drug::class;

    /**
     * @throws \Exception
     */
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
            'patient_id' => Patient::findOrFail($randomNumber)->getAttribute('id'),
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
