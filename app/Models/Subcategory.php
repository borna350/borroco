<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
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
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['slug', 'category_id', 'title', 'image', 'description', 'show_home_products','feature_title','feature_subtitle','feature_image', 'status'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product', 'subcategory_id', 'id');
    }

    public function subCateWiseProducts(){
        return $this->hasMany('App\Models\Product', 'subcategory_id', 'id')->orderBy('id', 'desc')->take(2);
    }
    public function wishlist(){
        return $this->hasMany('App\Models\Wishlist');
     }


}
