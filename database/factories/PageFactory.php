<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pageName'=>'Contact',
            'class1'=>$this->faker->word(),
            'class2'=>$this->faker->word(),
            'url'=>'testurl'


        ];
    }
}
