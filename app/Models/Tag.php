<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
