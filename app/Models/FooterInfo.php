<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterInfo extends Model
{
    protected $fillable = ['shipping_text', 'payments_text', 'returns_text', 'contacts_text', 'resi_text', 'company_text', 'type'];
}
