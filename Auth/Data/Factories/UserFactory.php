<?php

namespace App\Containers\AppSection\Auth\Data\Factories;

use App\Containers\AppSection\Auth\Models\User;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class UserFactory extends ParentFactory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'username' => fake()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}
