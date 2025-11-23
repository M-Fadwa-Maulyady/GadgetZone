<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'billing_name',
        'billing_email',
        'billing_phone',
        'total_price',
        'payment_status'
    ];
}
