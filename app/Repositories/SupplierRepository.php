<?php

namespace App\Repositories;

use App\Models\Supplier;
use App\Models\SupplierVendorProduct;


Class SupplierRepository
{
    public function getSuppliersOfRelevantVendor()
    {
        return Supplier::select(
            'suppliers.id',
            'name'
        )->join('supplier_vendor','supplier_vendor.supplier_id','suppliers.id')
        ->where('supplier_vendor.vendor_id',auth()->user()->vendor_id)
        ->get();
    }

    public function assign($data)
    {
        $supplierVendorProduct = new SupplierVendorProduct();
        $supplierVendorProduct->supplier_id = $data['supplier_id'];
        $supplierVendorProduct->vendor_product_id = $data['vendor_product_id'];
        return $supplierVendorProduct->save();
    }
}