<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'address',
        'customers_id'
    ];

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customers_id');
    }

    public function rentals()
    {
        return $this->hasMany(Rentals::class, 'address_id');
    }
}
