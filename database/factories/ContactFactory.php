<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'country'=>$this->faker->word(),
            'address'=>$this->faker->sentence(),'email'=>$this->faker->safeEmail(),'phone_number'=>$this->faker->phoneNumber(),
            'website'=>$this->faker->url(),
            'mobile'=>$this->faker->phoneNumber,'facebook_url'=>$this->faker->imageUrl(),'twitter_url'=>$this->faker->imageUrl(),'linkedin_url'=>$this->faker->imageUrl(),'tiktok_url'=>$this->faker->imageUrl()
        ];
    }
}
