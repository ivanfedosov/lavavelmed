<?php

namespace Tests\Feature\Traits;

use App\Models\User;

/**
 * Trait CreatesUser
 *
 * @package Tests\Feature
 */
trait CreatesUser
{
    private function createDoctor(): User
    {
        return User::factory()->assignRoleDoctor()->create();
    }

    private function createPatient(): User
    {
        return User::factory()->assignRolePatient()->create();
    }
}
