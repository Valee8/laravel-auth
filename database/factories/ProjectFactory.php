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
            'name' => fake() -> unique() -> words(rand(1, 5), true),
            'description' => fake() -> boolean()
                            ? fake() -> paragraph()
                            : null,
            //'main_image' => fake() -> imageUrl(200, 100, 'project', true),
            'release_date' => fake() -> dateTimeBetween('-6 month', 'now'),
            'repo_link' => fake() -> unique() -> url(),
        ];
    }
}
