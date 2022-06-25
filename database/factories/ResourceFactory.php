<?php

namespace Database\Factories;

use App\Models\Resource;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class ResourceFactory extends Factory
{

    protected $model = Resource::class;

    public function configure()
    {
        return $this->afterCreating(function (Resource $resource){
            Portfolio::factory(5)->create([
                'resource_id' => $resource->id,
                'created_by' => $resource->user->id
            ]);
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
            'country_id' => rand(1, 20),
            'skills' => implode(",", $this->faker->randomElements(['Salesforce', 'Sales Cloud', 'Apex', 'Integration', 'LWC', 'Aura', 'JavaScript'], 3)),
            'hourly_rate' => $this->faker->numberBetween(500, 10000),
            'weekly_rate' => $this->faker->numberBetween(1000,150000),
            'monthly_rate' => $this->faker->numberBetween(5000,20000),
            // 'created_by' =>$this->faker->randomElement(User::all())['id']
        ];
    }
}
