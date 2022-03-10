<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\SupplierService;
use App\Services\ProductService;

class ProductController extends Controller
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

    public function all(Request $request)
    {
        if ($request->ajax()) {
            return $this->service->all();
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