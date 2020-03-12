<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['about_logo', 'about_description', 'based_in','founded', 'about_banner_image', 'banner_title', 'banner_description','address', 'email', 'type'];
}
