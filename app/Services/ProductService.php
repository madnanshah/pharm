<?php

namespace App\Services;

use App\Repositories\ProductRepository;

use DataTables;

Class ProductService
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $repo;

    /**
     * @param ProductRepository $repo
     */
    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function find($id){
        return $this->repo->find($id);
    }

    public function getAll(){
        return DataTables::of(
            $this->repo->getAll()->get()
        )->addIndexColumn()
        ->addColumn(
            'action',
            function($row){
                return $row->vendor_product_id && $row->vendor_id == auth()->user()->vendor_id ?
                    '<a name="edit" id="'.$row->id.'" href="products/edit/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a>' :
                        '<a name="edit" id="'.$row->id.'" href="products/edit/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a>
                        <a name="create_vendor_product" id="'.$row->id.'"  href="/vendor_products/add/'.$row->id.'" title="Create Vendor Product" class="delete btn btn-warning btn-sm">Create VP</a>';
            }
        )->rawColumns(['action'])->make(true);
    }

    public function store($data)
    {
        return $this->repo->store(
            $this->setDescriptionAndTypeId($data)
        );
    }

    public function setDescriptionAndTypeId($data)
    {
        $type = explode('-', $data['type']);
        $data['type_id'] = $type[0];
        $data['description'] = $type[1].' '.$data['name'].' '.$data['grammage'].' ('.$data['salt'].') - '.$data['description'];
        return $data;
    }
}