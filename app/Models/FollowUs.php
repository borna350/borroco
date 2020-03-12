<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUs extends Model
{
    protected $fillable = ['social_media_name', 'social_media_link', 'status'];
}
