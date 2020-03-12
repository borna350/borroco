<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id', 'payment_type', 'credit_card_number', 'credit_card_expire_date', 'credit_card_code', 'sepa_iban', 'status'];

    public function paymentOrderDetails(){
        return $this->hasMany('App\Models\OrderDetails', 'payment_id', 'id');
    }
}
