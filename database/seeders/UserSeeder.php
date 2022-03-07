<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use App\Models\Resource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)
            ->hasHirer(1, function (array $attributes, User $user){
                return ['created_by' => $user->id];
            })
            ->create(['user_type' => 'hirer']);
//
        User::factory(5)
            ->hasResource(1, function(array $attributes, User $user){
                return ['created_by' => $user->id];
            })
            ->create(['user_type' => 'resource']);
    }
}
