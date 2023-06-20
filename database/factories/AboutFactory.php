<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title1'=>'<span>Providing innovative app solution</span> to make customer life easy to grow.',
            'content1'=>'<p data-aos="fade-up" data-aos-duration="1500">
                Lorem Ipsum is simply dummy text of the printing and type
                setting industry lorem Ipsum has been the industrys standard dummy text ever since the when an unknown
                printer took a galley of type and scrambled it to make a type specimen book. It has survived not only
                five centuries, but also the leap into electronic typesetting, remaining to make a type speci
                men book. It has survived essentially unchanged.
              </p>
              <p data-aos="fade-up" data-aos-duration="1500">
                Standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to
                make a type specien book. It has survived not only five centuries, but also the leap into electronic
                typesetting.
              </p>',
              'title2'=>'<span>We focus on quality,</span> never
                  focus on quantity',
            'content2'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the industrys standard dummy text ever since the when an unknown printer took a galley of type and.'
        ];
    }
}
