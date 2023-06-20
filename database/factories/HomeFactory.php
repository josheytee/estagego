<?php

namespace Database\Factories;
use App\Models\Home;
use Illuminate\Database\Eloquent\Factories\Factory;


class HomeFactory extends Factory
{
    protected $model=Home::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'page_title'=>$this->faker->unique()->title,
            // 'h1'=>$this->faker->unique()->title,
            'h2_orange'=>$this->faker->word(),
            'h2'=>$this->faker->word(),
            'caption'=>$this->faker->word(),
            // 'appstore_url'=>$this->faker->sentence(),
            // 'googleplay_url'=>$this->faker->sentence(),
            // 'video_url'=>$this->faker->sentence(),
            // 'total_users'=>$this->faker->randomDigit,
            // 'total_downloads'=>$this->faker->randomDigit,
            // 'total_household'=>$this->faker->randomDigit,
            // 'total_cities'=>$this->faker->randomDigit,
            // 'total_countries'=>$this->faker->randomDigit,
            // 'metatags'=>$this->faker->word,
            //  'keywords'=>$this->faker->word,
            //  'description'=>$this->faker->text,
            
             
             

            
        ];
    }
}
