<?php

namespace App\Validations;

Class ProductValidation
{
    public function store($request)
    {
        $validated = $request->validate([
            'type' => 'required|max:20',
            'name' => 'required|max:255',
            'salt' => 'required|max:255',
            'description' => 'max:200',
            'grammage' => 'required|max:255',
            'is_controlled' => 'required|max:1',
            'manufacturer_id' => 'required|max:20',
            'sub_category_id' => 'required|max:20',
        ]);
    }

}