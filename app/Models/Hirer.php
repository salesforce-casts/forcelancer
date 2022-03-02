<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hirer extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }


    public function resources()
    {
        return $this->belongsToMany(Resource::class, 'hirer_resource')
                    ->withTimestamps();
    }
}
