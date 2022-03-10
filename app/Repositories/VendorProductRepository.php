<?php

namespace App\Repositories;

use App\Models\VendorProduct;


Class VendorProductRepository
{
    public function store($product,$data)
    {
        $vendorProduct = new VendorProduct;
        $vendorProduct->product_id = $product->id;
        $vendorProduct->vendor_id = 1;
        $vendorProduct->is_controlled = $data['is_controlled'];
        return $vendorProduct->save();
    }
}