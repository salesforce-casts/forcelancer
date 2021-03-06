<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $guarded = ['total_hours_invoiced', 'total_earnings', 'created_by', 'created_by'];

    protected $appends = ['url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function hirers()
    {
        return $this->belongsToMany(Hirer::class)
            ->withTimestamps();
    }

    public function getUrlAttribute()
    {
        return route('show_profile', $this->id);
    }

    public function getNameAttribute($value)
    {

        return Resource::find($this->id)->user->name;
    }
}
