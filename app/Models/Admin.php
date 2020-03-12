<?php

namespace App\Models;;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, Sluggable;


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'role','email', 'product_type', 'address', 'description', 'avatar', 'status', 'password', 'phone_number', 'craft_request'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function artisanProduct(){
       return $this->hasOne('App\Models\Product', 'craftsman_id', 'id')->orderBy('id', 'desc');
     }

     public function adminOrderDetails(){
        return $this->hasMany('App\Models\OrderDetails', 'admin_id', 'id');
    }

}
