<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks'; // optional, perubahan kalau nama tabelnya bukan "produks"

    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'gambar',
        'deskripsi',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /** Relasi ke OrderItem (1 product bisa ada di banyak order item) */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
}
