<?php

namespace App\Repositories;

use App\Models\Product;


Class ProductRepository
{
    public function store($data)
    {
        $product = new Product;
        $product->type = $data['type'];
        $product->name = $data['name'];
        $product->salt = $data['salt'];
        $product->description = $data['description'];
        $product->manufacturer = $data['manufacturer'];
        $product->save();
        return $product;
    }
}