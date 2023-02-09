<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake() -> word(),
            'description' => fake() -> text(),
            'main_image' => fake() -> imageUrl(640, 480, 'project', true),
            'release_date' => fake() -> date(),
            'repo_link' => fake() -> url(),
        ];
    }
}
