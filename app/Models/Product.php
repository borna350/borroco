<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sluggable;

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

    protected $fillable = [
        'admin_id', 'craftsman_id', 'slug', 'material_id', 'category_id', 'subcategory_id', 'name', 'code', 'price', 'tax', 'discount_price', 'discount_prescriptions', 'description',
        'customer_production', 'short_note', 'thum_image_1', 'thum_image_2', 'in_stock', 'status'
    ];

    public function colors(){
        return $this->hasMany('App\Models\ProductColor', 'product_id', 'id');
    }

    public function sizes(){
        return $this->hasMany('App\Models\ProductSize', 'product_id', 'id');
    }

    public function images(){
        return $this->hasMany('App\Models\ProductImage', 'product_id', 'id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function material(){
        return $this->belongsTo('App\Models\Material', 'material_id', 'id');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\Subcategory', 'subcategory_id', 'id');
    }

    public function ShippingReturn(){
        return $this->hasOne('App\Models\ProductShippingReturn', 'product_id', 'id');
    }

    public function craftsman(){
        return $this->belongsTo('App\Models\Admin', 'craftsman_id', 'id');
    }
    public function wishlist(){
        return $this->hasMany('App\Models\Wishlist');
    }
    public function productWish(){
        return $this->hasOne('App\Models\Wishlist');
    }
    public function orderProductDetails(){
        return $this->hasMany('App\Models\OrderDetails', 'product_id', 'id');
    }
   
}
