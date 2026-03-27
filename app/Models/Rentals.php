<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rentals extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'address_id',
        'movie_id'
    ];

    public function addresses()
    {
        return $this->belongsTo(Addresses::class);
    }

    public function movies()
    {
        return $this->belongsTo(Movies::class, 'movie_id');
    }
}
