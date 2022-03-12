<?php

namespace App\Repositories;

use App\Models\VendorProduct;


Class VendorProductRepository
{
    public function store($data)
    {
        return VendorProduct::create($data);
    }

    public function getAll(){
        return VendorProduct::select(
            'vendor_products.id',
            'products.name',
            'products.description',
            'manufacturers.name as manufacturer',
            'sub_categories.name as sub_category',
            'vendor_products.is_active',
            'vendor_products.is_short',
            'vendor_products.is_discounted',
            'vendor_products.is_controlled',
            'suppliers.name as supplier'
        )->join('products', 'products.id', '=', 'vendor_products.product_id')
        ->join('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id')
        ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
        ->join('product_categories', 'product_categories.id', '=', 'sub_categories.product_category_id')
        ->join('supplier_vendor_products', 'supplier_vendor_products.vendor_product_id', '=', 'vendor_products.id')
        ->join('suppliers', 'suppliers.id', '=', 'supplier_vendor_products.supplier_id')
        ->get();
    }
}