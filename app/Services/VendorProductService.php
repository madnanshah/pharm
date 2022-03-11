<?php

namespace App\Services;

use App\Repositories\VendorProductRepository;
use App\Repositories\SupplierRepository;
use Illuminate\Support\Facades\DB;

Class VendorProductService
{
    /**
     * @var VendorProductRepository
     */
    private VendorProductRepository $repo;

    /**
     * @var SupplierRepository
     */
    private SupplierRepository $supplierRepo;

    /**
     * @param VendorProductRepository $repo
     * @param SupplierRepository $supplierRepo
     */

    public function __construct(VendorProductRepository $repo, SupplierRepository $supplierRepo)
    {
        $this->repo = $repo;
        $this->supplierRepo = $supplierRepo;
    }

    public function store($data)
    {   
        return DB::transaction(function () use ($data) {
            $data['vendor_id'] = auth()->user()->vendor_id;
            $vendorProduct = $this->repo->store($data);
    
            $data['vendor_product_id'] = $vendorProduct->id;
            return $status = $this->supplierRepo->assign($data);
        });
    }
}