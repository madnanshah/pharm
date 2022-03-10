<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\VendorProductRepository;
use Illuminate\Support\Facades\DB;
use DataTables;

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

    public function all(){
        return DataTables::of(
            $this->repo->all()
        )->addIndexColumn()
        ->addColumn(
            'action',
            function($row){
                return '<a name="edit" id="'.$row->id.'" href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a name="delete" id="'.$row->id.'"  href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
            }
        )->rawColumns(['action'])->make(true);
    }

    public function store($data)
    {
        return $this->repo->store($data);
    }
}