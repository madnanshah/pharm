<?php

namespace App\Repositories;

use App\Models\Manufacturer;


Class ManufacturerRepository
{
    public function getAll()
    {
        return Manufacturer::all();
    }
}