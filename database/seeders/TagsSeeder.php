<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $resource = Resource::find(11);
        //Auth::id()
        $user = User::find(4);

        $tag = new Tag;
        $tag->name = Str::random(10);
        $tag->resource()->associate($resource);
        $tag->user()->associate($user);
        $tag->save();
    }
}
