<?php

namespace App\Validations;

Class VendorProductValidation
{
    public function store($request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|digits_between:1,20|exists:products,id',
            'product_id' => 'unique:vendor_products,product_id,null,id,vendor_id,'.auth()->id(),
            'is_controlled' => 'required|boolean',
            'supplier_id' => 'required|integer|digits_between:1,20|exists:suppliers,id',
        ]);
    }

}