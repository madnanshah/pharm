<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

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

    public function getAll(){
        return DataTables::of(
            $this->repo->getAll()
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