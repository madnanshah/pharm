<?php

namespace App\Repositories;

use App\Models\Supplier;


Class SupplierRepository
{
    public function getSuppliers()
    {
        return Supplier::all();
    }
}