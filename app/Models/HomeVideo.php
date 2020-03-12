<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class HomeVideo extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = ['slug', 'craftsman_id', 'title', 'subtitle','image', 'link', 'status'];


    public function craftsman(){
        return $this->belongsTo('App\Models\Admin', 'craftsman_id', 'id');
    }
}
