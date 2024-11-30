<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        "title",
        "short_des",
        "price",
        "discount",
        "discount_price",
        "image",
        "stock",
        "star",
        "remark",
        "main_category_id ",
        "category_id ",
        "brand_id "
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id'); // 'Category id' is the foreign key
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
