<?php

namespace App\Repositories;

use App\Models\Product;


Class ProductRepository
{
    public function all(){
        return Product::latest()->get();
    }

    public function store($data)
    {
        $product = new Product;
        $product->type = $data['type'];
        $product->name = $data['name'];
        $product->salt = $data['salt'];
        $product->description = $data['description'];
        $product->grammage = $data['grammage'];
        $product->sub_category_id = $data['sub_category_id'];
        $product->manufacturer_id = $data['manufacturer_id'];
        return $product->save();
    }
}