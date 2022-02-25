<?php

namespace Database\Seeders;

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
//        User::factory()
//            ->count(5)
//            ->create(['user_type' => 'hirer']);
//
//        User::factory()
//            ->count(5)
//            ->hasResource(1, function(array $attributes, User $user){
//                return ['created_by' => $user->id];
//            })
//            ->create(['user_type' => 'resource']);

//        \App\Models\User::factory()->create(['user_type'=>'resource'])->each(function($user) {
//
//            $resource = factory(App\Resource::class)->make('created_by', $user->id);
//
//            $portfolio = factory(App\Portfolio::class)->create(5, [
//                'resource_id' => $resource
//            ]);
//
//            $user->entities()->save($resource);
//        });

    }
}
