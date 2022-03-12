<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VendorProductService;
use App\Services\ProductService;
use App\Services\SupplierService;
use App\Validations\VendorProductValidation;

class VendorProductController extends Controller
{
    /**
     * @var VendorProductService
     */
    private VendorProductService $service;

    /**
     * @var VendorProductValidation
     */
    private VendorProductValidation $validation;

    /**
     * @var ProductService
     */
    private ProductService $productService;

    /**
     * @var SupplierService
     */
    private SupplierService $supplierService;


    /**
     * @param VendorProductService $service
     * @param VendorProductValidation $validation
     * @param ProductService $productService
     * @param SupplierService $supplierService
     */
    public function __construct(
        VendorProductService $service,
        VendorProductValidation $validation,
        ProductService $productService,
        SupplierService $supplierService
    )
    {
        $this->service = $service;
        $this->validation = $validation;
        $this->productService = $productService;
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        return view('vendor_products.index');
    }

    public function getAll(Request $request){
        if ($request->ajax()) {
            return $this->service->getAll();
        }
    }

    public function add($product_id){
        return view(
            'vendor_products.add',
                [
                    'product' => $this->productService->find($product_id),
                    'suppliers' => $this->supplierService->getSuppliersOfRelevantVendor(),
                ]
        );
    }

    public function store(Request $request)
    {
        $this->validation->store($request);
        return redirect()->back()->with(
            'status', $this->service->store($request->all())
        );
    }


}