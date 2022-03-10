<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\SupplierService;
use App\Services\ProductService;
use DataTables;

class ProductsController extends Controller
{
    /**
     * @var ProductService
     */
    private ProductService $service;

    /**
     * @var SupplierService
     */
    private SupplierService $supplierService;

    /**
     * @param SupplierService $supplierService
     * @param ProductService $service
     */
    public function __construct(SupplierService $supplierService, ProductService $service)
    {
        $this->service = $service;
        $this->supplierService = $supplierService;
    }

    public function index(){
        return view('products.index');
    }

    public function getAllProducts(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function add(){
        $suppliers = $this->supplierService->getSuppliers();
        return view('products.add', ['suppliers'=>$suppliers]);
    }

    public function store(Request $request)
    {
        return redirect()->back()->withInput([
            'suppliers' => $this->supplierService->getSuppliers(),
            'status' => $this->service->store($request->all())
        ]);
    }
}
