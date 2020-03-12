<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishlist(){
        return $this->hasMany('App\Models\Wishlist');
     }

     public function billingAddress(){
        return $this->hasOne('App\Models\BillingAddress', 'user_id', 'id');
    }
    public function shippingAddress(){
        return $this->hasOne('App\Models\ShippingAddress', 'user_id', 'id');
    }
    
    public function coupons(){
        return $this->hasMany('App\Models\Coupon', 'user_id', 'id');
    }
    public function order(){
        return $this->hasMany('App\Models\Order', 'user_id', 'id');
    }
}
