<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title'
    ];

    public function rentals()
    {
        return $this->hasMany(Rentals::class, 'movie_id');
    }
}
