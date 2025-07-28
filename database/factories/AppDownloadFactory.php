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
            'title' => $this->faker->sentence(),
            'content' => 'Instant free download from apple and play store',
            'image' => '{{asset("asset/images/appstore_blue.png")}}',
            'image2' => '{{asset("asset/images/googleplay_blue.png")}}',
            'url' => 'https://play.google.com/store/apps/details?id=com.estatego.tithcqo',
            'url2' => 'https://play.google.com/store/apps/details?id=com.estatego.tithcqo',


        ];
    }
}
