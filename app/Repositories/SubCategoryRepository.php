<?php

namespace App\Repositories;

use App\Models\SubCategory;


Class SubCategoryRepository
{
    public function getAllWithCategories()
    {
        return SubCategory::select(
            'sub_categories.id as sub_category_id',
            'sub_categories.name as sub_category_name',
            'product_categories.name as category_name'
        )->join('product_categories', 'product_categories.id', '=', 'sub_categories.product_category_id')
        ->get();
    }
}