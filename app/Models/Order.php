<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders'; // optional, tapi bagus kalau ditulis

    protected $fillable = [
        'user_id',
        'total_price',
        'payment_method',
        'shipping_address',
        'status',
    ];

    /** Relasi ke tabel OrderItem */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    /** Relasi ke User */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
