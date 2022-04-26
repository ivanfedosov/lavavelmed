<?php

/**
 * @file PatientTestFactory.php
 *
 * @date 09.11.2021
 *
 */

declare(strict_types=1);

namespace Database\Factories\TestFactory;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientTestFactory extends Factory
{
    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            'user_id' => 2,
            'is_approved' => true,
            'is_diabetic' => false,
            'is_profile_filled' => true,
            'max_weight' => 228,
            'gender' => 1,
            'birth_date' => $this->faker->dateTime->getTimestamp(),
            'height' => $this->faker->numberBetween(150, 199),
            'hospitalisation_date' => $this->faker->dateTime->getTimestamp(),
            'leaving_date' => $this->faker->dateTime->getTimestamp(),
        ];
    }
}

