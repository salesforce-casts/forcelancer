<?php

namespace Database\Seeders;

use App\Models\HirerResource;
use Illuminate\Database\Seeder;

class HirerResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HirerResource::factory(5)->create([
            'monthly' => true,
            'weekly' => false,
            'hours'=> false,
        ]);

        HirerResource::factory(5)->create([
            'monthly' => false,
            'weekly' => true,
            'hours'=> false,
        ]);

        HirerResource::factory(5)->create([
            'monthly' => false,
            'weekly' => false,
            'hours'=> true,
        ]);
    }
}
