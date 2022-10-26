<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class penjualFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'   => 1,
            'nim'       => 1037,
            'portofolio'=> 'https://ok.com',
            'github'=> 'https://ok.com',
            'logo'=> '1.jpg',
        ];
    }
}
