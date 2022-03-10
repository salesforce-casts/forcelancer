<?php

namespace Database\Factories;

use App\Models\Hirer;
use App\Models\HirerResource;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class HirerResourceFactory extends Factory
{

    protected $model = HirerResource::class;

    public function configure()
    {
        return $this->afterMaking(function (HirerResource $hirerResource){
//            dd($hirerResource->id);
//           Review::factory(1)->create([
//               'created_by' => $hirerResource->created_by,
//               'hirer_resource_id' => 1
//           ]);
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomUser = Hirer::inRandomOrder()->first();

        return [
            'receipt_id' => 'Receipt_' . $this->faker->numberBetween(10000, 100000),
            'order_id' => 'Order_' . $this->faker->numberBetween(10000, 100000),
            'payment_id' => 'Payment_' . $this->faker->numberBetween(10000, 100000),
            'hirer_id' => $randomUser,
            'resource_id' => Resource::inRandomOrder()->first(),
            'created_by' => $randomUser,
            'final_charges' => $this->faker->numberBetween(10, 300)
        ];
    }
}
