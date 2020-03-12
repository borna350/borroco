<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['user_id', 'code', 'status', 'use_status', 'discount_price'];

   
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
   
}
