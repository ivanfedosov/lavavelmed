<?php

/**
 * @file ConsultationTestFactory.php
 *
 * @date 09.11.2021
 *
 */

declare(strict_types=1);

namespace Database\Factories\TestFactory;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ConsultationTestFactory extends Factory
{
    protected $model = Consultation::class;

    /**
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'patient_id' => 1,
            'doctor_id' => 1,
            'title' => $this->faker->colorName,
            'date' => Carbon::now(),
        ];
    }
}
