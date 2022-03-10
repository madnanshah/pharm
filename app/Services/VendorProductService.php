<?php

namespace App\Services;

use App\Repositories\VendorRepository;

Class ProductService
{
    /**
     * @var VendorProductRepository
     */
    private VendorProductRepository $repo;

    /**
     * @param VendorProductRepository $repo
     */

    public function __construct(VendorProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function store($product,$data)
    {
        return $this->repo->store($product,$data);
    }
}