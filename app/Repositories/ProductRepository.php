<?php

namespace App\Repositories;

use App\Models\Product;


Class ProductRepository
{
    public function find($id){
        return Product::find($id);
    }

    public function getAll(){
        return Product::select(
            'products.id',
            'product_types.name as type',
            'products.name',
            'products.grammage',
            'products.salt',
            'manufacturers.name as manufacturer',
            'products.description',
            'sub_categories.name as sub_category',
            'vendor_products.id as vendor_product_id',
            'vendor_products.vendor_id',
        )->leftJoin('product_types', 'product_types.id', '=', 'products.type_id')
        ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id')
        ->leftJoin('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
        ->leftJoin('product_categories', 'product_categories.id', '=', 'sub_categories.product_category_id')
        ->leftJoin('vendor_products', function ($join) {
            $join->on('vendor_products.product_id', '=', 'products.id')
            ->where('vendor_products.vendor_id',auth()->user()->vendor_id);
        });
    }

    public function store($data)
    {
        $product = new Product();
        $product->name = $data['name'];
        $product->type_id = $data['type_id'];
        $product->salt = $data['salt'];
        $product->description = $data['description'];
        $product->grammage = $data['grammage'];
        $product->sub_category_id = $data['sub_category_id'];
        $product->manufacturer_id = $data['manufacturer_id'];
        return $product->save();
    }
}