<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       return [
            "name"=>ucwords($this->faker->word)
        ];
        /*
        $list = ['News', 'Tech', 'Web', 'Mobile', 'Lang'];
        foreach($list as $name) {
            \App\Models\Category::create(['name' => $name]);
        }*/
    }
}
