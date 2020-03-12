<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'shipping_id', 'sub_total_amount', 'total_amount', 'status'];


    // public function orderDetails(){
    //     return $this->hasMany('App\Models\OrderDetails', 'order_id', 'id');
    // }
    public function orderDetails(){
        return $this->hasOne('App\Models\OrderDetails');
    }

    public function paymentOrder(){
        return $this->hasMany('App\Models\Payment', 'order_id', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function shippingAddress(){
        return $this->belongsTo('App\Models\ShippingAddress', 'shipping_id', 'id');
    }
    
}



