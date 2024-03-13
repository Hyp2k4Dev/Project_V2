<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['Name_customer', 'phone', 'address', 'gmail', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
