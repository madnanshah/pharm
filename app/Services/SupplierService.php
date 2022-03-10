<?php

namespace App\Services;

use App\Repositories\SupplierRepository;

Class SupplierService
{
    /**
     * @var SupplierRepository
     */
    private SupplierRepository $repo;

    /**
     * @param SupplierRepository $repo
     */

    public function __construct(SupplierRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getSuppliers()
    {
        return $this->repo->getSuppliers();
    }



}

