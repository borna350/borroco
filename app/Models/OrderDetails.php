<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['admin_id', 'shipping_id', 'order_id', 'payment_id', 'product_id', 'product_name', 'product_price', 'product_quantity'];


    public function payment(){
        return $this->hasOne('App\Models\Payment', 'payment_id', 'id')->orderBy('id','desc');
    }
    public function orders(){
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }

    public function shippingAddress(){
        return $this->belongsTo('App\Models\ShippingAddress', 'shipping_id', 'id');
    }
    public function products(){
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

}
