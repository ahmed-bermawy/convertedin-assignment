<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $adminUsers = User::where('is_admin', 1)->pluck('id');
        $normalUsers = User::where('is_admin', 0)->pluck('id');

        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph(),
            'assigned_to_id' => fake()->randomElement($normalUsers),
            'assigned_by_id' => fake()->randomElement($adminUsers),
        ];
    }
}
