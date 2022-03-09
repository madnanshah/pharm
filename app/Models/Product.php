<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'second_id',
        'name',
        'description',
        'salt',
        'type',
        'grammage',
        'manufacturer',
        'product_category_id',
        'sub_category_id'
    ];
}
