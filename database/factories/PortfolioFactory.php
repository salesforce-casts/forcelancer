<?php

namespace Database\Factories;

use App\Models\Portfolio;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{


    protected $model = Portfolio::class;

    public function configure()
    {
        return $this->afterCreating(function (Portfolio $portfolio){
           Review::factory(1)->create([
               'created_by' => $portfolio->resource->user->id,
               'resource_id' => $portfolio->resource->id
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
	        'title' => $this->faker->word,
	        'video_url'=> $this->faker->url(),
	        'description' => $this->faker->sentence()
        ];
    }
}
