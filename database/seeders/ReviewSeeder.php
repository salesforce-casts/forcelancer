<?php

namespace Database\Seeders;

use App\Models\HirerResource;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hireResources = HirerResource::all();
        foreach($hireResources as $hireResource)
        {
            Review::factory(1)->create([
                'created_by' => $hireResource->created_by,
                'hirer_resource_id' => $hireResource->id
            ]);
        }
    }
}
