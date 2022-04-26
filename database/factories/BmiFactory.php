<?php

/**
 * @file BmiFactory.php
 * MonitoringListResource
 * @date 17.05.2021
 *
 */

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Bmi;
use Illuminate\Database\Eloquent\Factories\Factory;

class BmiFactory extends Factory
{
    protected $model = Bmi::class;

    public function definition(): array
    {
        return [
            'min' => $this->faker->numberBetween(10, 55),
            'max' => $this->faker->numberBetween(10, 55),
            'is_diabetic' => false,
            'title' => $this->faker->title,
            'text' => $this->faker->text,
        ];
    }
}
