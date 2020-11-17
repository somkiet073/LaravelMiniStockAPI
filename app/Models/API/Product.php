<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   // use HasFactory;
    
    protected $fillable = [
        'product_name',
        'product_detail',
        'product_price',
        'category_id'
    ];
}
