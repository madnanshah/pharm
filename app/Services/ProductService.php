<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\VendorProductRepository;
use Illuminate\Support\Facades\DB;

Class ProductService
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $repo;

    /**
     * @var VendorProductRepository
     */
    private VendorProductRepository $vendorProductRepository;

    /**
     * @param ProductRepository $repo
     * @param VendorProductRepository $vendorProductRepository
     */

    public function __construct(ProductRepository $repo, VendorProductRepository $vendorProductRepository)
    {
        $this->repo = $repo;
        $this->vendorProductRepository = $vendorProductRepository;
    }

    public function store($data)
    {
        DB::transaction(function () use ($data){
            $product = $this->repo->store($data);
            return $this->vendorProductRepository->store($product,$data);
        });
    }
}