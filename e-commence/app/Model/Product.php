<?php

namespace App\Model;

use App\Review;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'details', 'price', 'stock', 'discount', 'user_id'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
