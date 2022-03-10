<?php

namespace App\Repositories;

use App\Models\Product;


Class ProductRepository
{
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
        )->join('product_types', 'product_types.id', '=', 'products.type_id')
        ->join('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id')
        ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
        ->join('product_categories', 'product_categories.id', '=', 'sub_categories.product_category_id')
        ->get();
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