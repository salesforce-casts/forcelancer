<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HirerResource extends Pivot
{
    use HasFactory;

    public function hirer(){
        return $this->belongsTo(Hirer::class);
    }

    public function resource(){
        return $this->belongsTo(Resource::class);
    }

    public function review(){
        return $this->hasOne(Review::class);
    }
}
