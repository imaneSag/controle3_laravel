<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence,
            'pages' => $this->faker->numberBetween(50, 500),
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'categorie_id' => function () {
                return \App\Models\Categorie::factory()->create()->id;
            }
        ];
    }
}
