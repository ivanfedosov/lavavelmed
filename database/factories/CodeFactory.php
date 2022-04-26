<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Code;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CodeFactory extends Factory
{
    protected $model = Code::class;

    public function definition(): array
    {
        return [
            'phone' => $this->faker->phoneNumber,
            'value' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
        ];
    }
}
