<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama','icon'];

    public function products()
    {
        return $this->hasMany(Produk::class, 'category_id');
    }
}
