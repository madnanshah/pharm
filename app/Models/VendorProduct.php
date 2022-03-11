<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'second_id',
        'product_id',
        'vendor_id',
        'is_active',
        'is_short',
        'is_discounted',
        'is_controlled'
    ];
}
