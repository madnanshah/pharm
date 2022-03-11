<?php

namespace App\Repositories;

use App\Models\ProductType;


Class TypeRepository
{
    public function find($id){
        return ProductType::find($id);
    }

    public function getAll()
    {
        return ProductType::all();
    }
}