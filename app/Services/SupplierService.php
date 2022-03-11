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

    public function getSuppliersOfRelevantVendor() // suppliers that are assigned to this vendor
    {
        return $this->repo->getSuppliersOfRelevantVendor();
    }



}