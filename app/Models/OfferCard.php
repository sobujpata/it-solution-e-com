<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferCard extends Model
{
    protected $fillable = [
        'title',
        'short_des',
        'discount',
        'image',
    ];
}
