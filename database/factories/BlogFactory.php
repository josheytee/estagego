<?php

namespace Database\Factories;
use App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;


class BlogFactory extends Factory
{
     protected $model=Blog::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $top_blogs=$this->faker->unique()->randomElement([1,0]);
        return [
            'author_id'=>$this->faker->randomDigit,
            'title'=>$this->faker->unique()->title,
            'caption'=>$this->faker->sentence,
            'content'=>$this->faker->unique()->sentence,
            'image'=>$this->faker->imageUrl(),
            'date'=>$this->faker->word(),
            'tags'=>$this->faker->word(),
            'top_blog'=>$this->faker->unique()->randomElement([1,0]),
        

        ];
    }
}
