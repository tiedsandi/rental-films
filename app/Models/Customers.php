<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'full_name',
        'salutation',
    ];

    public function addresses()
    {
        return $this->hasMany(Addresses::class, 'customers_id');
    }
}
