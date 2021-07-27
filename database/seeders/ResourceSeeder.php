<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Resource;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::find(1);

        $resource = new Resource;

        $resource->name = Str::random(10);
        $resource->email = Str::random(10) . '@gmail.com';
        $resource->describe = Str::random(10);
        $resource->country = Str::random(10);
        $resource->timezone = Str::random(10);
        $resource->skills = Str::random(10);
        $resource->hourly_rate = 10;
        $resource->weekly_rate = 10;
        $resource->monthly_rate = 10;;

        $user->createdBy()->save($resource);
    }
}
