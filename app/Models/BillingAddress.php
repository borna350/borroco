<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    protected $fillable = ['user_id', 'first_name', 'last_name', 'company_name', 'country_id', 'street_address', 'apartment_name', 'town', 'district', 'post_code', 'phone', 'email'];
}
