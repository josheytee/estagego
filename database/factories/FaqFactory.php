<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'=>$this->faker->numberBetween(1,3),
            'subcategory_name'=>$this->faker->randomElement(['GETTING STARTED','MANAGING PROPERTIES', 'GETTING REPORT']),
           'question'=>$this->faker->randomElement([
            'How can I pay?','How to setup account?','what is the process to get refund?','can i get code bug for customization?'
           ]),
           'answer'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has. been the industrys standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen turies but also the leap into electronic typesetting, remaining essentially unchanged.',
           'featured'=>'true'
           
        ];
    }
}
