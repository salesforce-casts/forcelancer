<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'review'];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function hirerResource(){
        return $this->belongsTo(Resource::class);
    }

    public static function getResourceOverallRating($resource_id)
    {
        return self::where('resource_id', $resource_id)->selectRaw('count(id) as total_review, Round(AVG(rating), 2) as avg_rating')->first();
    }
}
