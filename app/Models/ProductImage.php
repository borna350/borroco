<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id', 'image', 'status'
    ];
    public function productImage(){
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
