<?php

namespace App\Services;

use App\Repositories\VendorProductRepository;
use App\Repositories\SupplierRepository;
use Illuminate\Support\Facades\DB;
use DataTables;

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

    public function __construct(
        VendorProductRepository $repo,
        SupplierRepository $supplierRepo
    )
    {
        $this->repo = $repo;
        $this->supplierRepo = $supplierRepo;
    }

    public function getAll()
    {
        return DataTables::of(
            $this->repo->getAll()
        )->addIndexColumn()
        ->addColumn(
            'action',
            function($row){
                return '<a name="edit" id="'.$row->id.'" href="products/edit/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a>';
            }
        )->rawColumns(['action'])->make(true);
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