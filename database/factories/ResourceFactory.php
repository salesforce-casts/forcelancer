<?php

namespace Database\Factories;

use App\Models\Resource;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ResourceFactory extends Factory
{

    protected $model = Resource::class;

    public function configure()
    {
        return $this->afterCreating(function (Resource $resource){

        });
    }


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'describe' => $this->faker->text(),
            'country' => $this->faker->country(),
            'skills' => implode(",", $this->faker->randomElements(['Salesforce', 'Sales Cloud', 'Apex', 'Integration', 'LWC', 'Aura', 'JavaScript'], 3)),
            'hourly_rate' => 10,
            'weekly_rate' => 10,
            'monthly_rate' => 10,
            // 'created_by' =>$this->faker->randomElement(User::all())['id']
        ];
    }
}
