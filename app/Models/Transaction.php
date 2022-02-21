<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
    public function hirer()
    {
        return $this->belongsTo(Resource::class, 'hirer_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
