<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductShippingReturn extends Model
{
    protected $fillable = [
        'product_id', 'costs', 'delivery_time', 'return_policy', 'status'
    ];
}
