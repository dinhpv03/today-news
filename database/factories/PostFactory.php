<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{

    /**
     * Define the model's default state.
     */
    public function definition()
    {

        return [
            'category_id' => fake()->numberBetween(4,12),
            'author_id' => fake()->numberBetween(1,2),
            'title' => fake()->text(50),
            'slug' => fake()->slug,
            'excerpt' => fake()->text(50),
            'content' => fake()->text(500),
            'image' => 'https://greenwich.edu.vn/wp-content/uploads/2020/12/nganh-cong-nghe-thong-tin-co-de-xin-viec-khong-1.png.webp',
            'published_at' => fake()->date(),
            'views' => fake()->numberBetween(0, 1000),
            'is_active' => fake()->numberBetween(1,2),
        ];
    }
}
