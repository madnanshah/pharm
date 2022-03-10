<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\SubCategoryService;
use App\Services\ManufacturerService;
use App\Services\TypeService;
use App\Validations\ProductValidation;

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
     * @var TypeService
     */
    private TypeService $typeService;

    /**
     * @var ProductValidation
     */
    private ProductValidation $validation;

    /**
     * @param ProductService $service
     * @param SubCategoryService $subCategoryService
     * @param ManufacturerService $manufacturerService
     * @param TypeService $typeService
     * @param ProductValidation $validation
     */
    public function __construct(
        ProductService $service,
        SubCategoryService $subCategoryService, 
        ManufacturerService $manufacturerService,
        TypeService $typeService,
        ProductValidation $validation
    )
    {
        $this->service = $service;
        $this->subCategoryService = $subCategoryService;
        $this->manufacturerService = $manufacturerService;
        $this->typeService = $typeService;
        $this->validation = $validation;
    }

    public function index(){
        return view('products.index');
    }

    public function getAll(Request $request)
    {
        if ($request->ajax()) {
            return $this->service->getAll();
        }
    }

    public function add(){
        return view(
            'products.add',
            [
                'categories' => $this->subCategoryService->getAllWithCategories(), 
                'manufacturers' => $this->manufacturerService->getAll(),
                'types' => $this->typeService->getAll(),
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