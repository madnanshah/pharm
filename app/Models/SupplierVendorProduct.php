<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierVendorProduct extends Model
{
    use HasFactory;

    protected $fillables = [
        'supplier_id',
        'vendor_product_id',
        'is_active'
    ];
}
