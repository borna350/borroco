<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = ['user_id', 'first_name', 'last_name', 'company_name', 'country_id', 'street_address', 'apartment_name', 'town', 'district', 'post_code'];

    public function shippingOrderDetails(){
        return $this->hasMany('App\Models\OrderDetails', 'shipping_id', 'id');
    }

    public function orderShipping(){
        return $this->hasMany('App\Models\Order', 'shipping_id', 'id');
    }
}
