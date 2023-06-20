<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppDownloadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'content'=>'Instant free download from apple and play store orem Ipsum is simply dummy text of the printing. and typese tting indus orem Ipsum has beenthe standard',
            'image'=>'{{asset("asset/images/appstore_blue.png")}}',
            'image2'=>'{{asset("asset/images/googleplay_blue.png")}}',
            'url'=>'xxx',
            'url2'=>'xxx',
            

        ];
    }
}
