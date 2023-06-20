<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'position'=>'position',
            'company'=>'company',
            'content'=>$this->faker->sentence(),
            'image'=>$this->faker->imageUrl()

        ];
    }
}
