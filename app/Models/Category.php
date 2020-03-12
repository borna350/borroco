<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
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

    protected $fillable = ['slug', 'title', 'image', 'description', 'cover_image', 'site_title', 'site_subtitle', 'video_link', 'status'];

    public function subcategories(){
        return $this->hasMany('App\Models\Subcategory', 'category_id', 'id');
    }

    public function homeSubcategories(){
        return $this->hasMany('App\Models\Subcategory', 'category_id', 'id')->where('show_home_products', 1);
    }
}
