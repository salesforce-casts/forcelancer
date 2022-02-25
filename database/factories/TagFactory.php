<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class TagFactory extends Factory
{

    protected $tags = ['Salesforce', 'Sales Cloud', 'Apex', 'Integration', 'LWC', 'Aura', 'JavaScript'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => implode(",", $this->faker->randomElements($this->tags, 3))
        ];
    }
}
