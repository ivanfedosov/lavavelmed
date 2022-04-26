<?php

/**
 * @file DoctorTestFactory.php
 *
 * @date 09.11.2021
 *
 */

declare(strict_types=1);

namespace Database\Factories\TestFactory;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorTestFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition(): array
    {
        return [
            'user_id' => 1,
            'is_activated' => true,
            'qualification' => $this->faker->text(254),
            'job' => $this->faker->text(254),
            'experience' => $this->faker->numberBetween(1, 99),
            'link_facebook' => $this->faker->url,
            'link_twitter' => $this->faker->url,
            'link_instagram' => $this->faker->url,
            'link_prodoctorov' => $this->faker->url,
            'specialisation_id' => null,
            'hospital_id' => null,
        ];
    }

}

