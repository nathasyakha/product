<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'vat'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
