<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\SubCategoryService;
use App\Services\ManufacturerService;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private ProductService $service;

    /**
     * @var SubCategoryService
     */
    private SubCategoryService $subCategoryService;

    /**
     * @var ManufacturerService
     */
    private ManufacturerService $manufacturerService;

    /**
     * @param SubCategoryService $subCategoryService
     * @param ProductService $service
     * @param ManufacturerService $manufacturerService
     */
    public function __construct(
        ProductService $service,
        SubCategoryService $subCategoryService, 
        ManufacturerService $manufacturerService
    )
    {
        $this->service = $service;
        $this->subCategoryService = $subCategoryService;
        $this->manufacturerService = $manufacturerService;
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
        return view(
            'products.add',
            [
                'categories' => $this->subCategoryService->getAllWithCategories(), 
                'manufacturers' => $this->manufacturerService->getAll()
            ]
        );
    }

    public function store(Request $request)
    {
        return redirect()->back()->withInput([
            'status' => $this->service->store($request->all())
        ]);
    }
}