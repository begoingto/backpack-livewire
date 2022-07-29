<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(20),
            'feature_image' => fake()->imageUrl(510, 265),
            'category_id' => fake()->numberBetween(1, 100),
            'user_id' => fake()->numberBetween(1, 3)
        ];
    }
}
