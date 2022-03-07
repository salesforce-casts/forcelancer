<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    // TODO: Create foreign key relation between users and portfolio
}
