<?php

/**
 * @file UsersTableSeeder.php
 * MonitoringListResource
 * @date 05.05.2021
 *
 */

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UsersTableSeeder extends Seeder
{
    public \Faker\Generator $faker;

    public function run(): void
    {
        $this->faker = \Faker\Factory::create();

        $this->createUserAdmin();

        for ($i = 1; $i < 5; $i++) {
            $this->createUserDoctor([
                'full_name' => "Doctor $i",
                'phone' => '7' . str_repeat($i, 10),
                'email' => "doctor_$i@medic.ru",
                'is_banned' => 0,
            ]);
        }

        for ($i = 1; $i < 5; $i++) {
            $this->createUserPatient([
                'full_name' => "Patient $i",
                'phone' => '7' . str_repeat($i + 4, 10),
                'email' => "patient_$i@mail.ru",
                'is_banned' => 0,
            ]);
        }

    }

    public function createUserAdmin(): void
    {
        \App\Models\User::factory()->create([
            'account_type' => '9',
            'phone' => '79999999999',
            'email' => 'admin@medic.ru',
            'password' => bcrypt('secret'),
            'lang' => 'ru',
            'timezone' => 'MKS',
        ]);
    }

    public function createUserDoctor(array $data): void
    {
        $user = \App\Models\User::factory()->create([
            'account_type' => '1',
            'full_name' => Arr::get($data, 'full_name'),
            'phone' => Arr::get($data, 'phone'),
            'email' => Arr::get($data, 'email'),
            'lang' => 'ru',
            'timezone' => 'MKS',
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'is_activated' => true,
            'qualification' => $this->faker->text(254),
            'job' => $this->faker->text(254),
            'experience' => $this->faker->numberBetween(1, 99),
            'link_facebook' => $this->faker->url,
            'link_twitter' => $this->faker->url,
            'link_instagram' => $this->faker->url,
            'link_prodoctorov' => $this->faker->url,
            'specialisation_id' => '1',
            'hospital_id' => '1',
        ]);
    }

    public function createUserPatient(array $data): void
    {
        $user = \App\Models\User::factory()->create([
            'account_type' => '2',
            'full_name' => Arr::get($data, 'full_name'),
            'phone' => Arr::get($data, 'phone'),
            'email' => Arr::get($data, 'email'),
            'lang' => 'ru',
            'timezone' => 'MKS',
        ]);

        Patient::create([
            'user_id' => $user->id,
            'is_approved' => Arr::get($data, 'is_approved', true),
            'is_diabetic' => Arr::get($data, 'is_diabetic', false),
            'is_profile_filled' => Arr::get($data, 'is_profile_filled', true),
            'max_weight' => Arr::get($data, 'max_weight', 228),
            'gender' => Arr::get($data, 'gender', 1),
            'birth_date' => Arr::get($data, 'birth_date', $this->faker->dateTime->getTimestamp()),
            'height' => Arr::get($data, 'height', $this->faker->numberBetween(150, 199)),
            'hospitalisation_date' => Arr::get($data, 'hospitalisation_date', $this->faker->dateTime->getTimestamp()),
            'leaving_date' => Arr::get($data, 'leaving_date', $this->faker->dateTime->getTimestamp()),
        ]);
    }
}
