<?php

/**
 * @file UserFactory.php
 * MonitoringListResource
 * @date 18.03.2021
 *
 */

namespace Database\Factories;

use App\Models\Code;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'account_type' => '1',
            'full_name' => $this->faker->firstName . $this->faker->lastName,
            'phone' => '79999999999',
            'email' => $this->faker->email,
            'is_banned' => 0,
            'lang' => 'ru',
        ];
    }
}
