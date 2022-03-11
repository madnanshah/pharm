<?php

namespace App\Repositories;

use App\Models\VendorProduct;


Class VendorProductRepository
{
    public function store($data)
    {
        return VendorProduct::create($data);
    }
}