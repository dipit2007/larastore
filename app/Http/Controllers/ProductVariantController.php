<?php

namespace App\Http\Controllers;

use App\ProductVariant;
use Illuminate\Http\Request;

use App\Product;

use App\ProductBrand;
use App\ProductCategory;


use App\ProductAttribute;
use App\ProductAttributeValue;

use App\ProductVariantAttributeValue;

use Validator;

use Yajra\Datatables\Datatables;

use URL;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = "productvariant";
        $data['submenu'] = "productvariantlist";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";
        
        $data['contentCardHeaderTitle'] = "PRODUCT VARIANT LIST";


        return view('theme.backend.pages.product.variant.list', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = "productvariant";
        $data['submenu'] = "productvariantcreate";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";

        $data['contentCardHeaderTitle'] = "CREATE PRODUCT VARIANT";

        $productList = Product::pluck('name', 'id');
        $selectedProduct = 1;

        $data['productList'] = $productList;
        $data['selectedProduct'] = $selectedProduct;

        $productattributeList = ProductAttribute::pluck('name', 'id');
        $selectedProductAttribute = 1;

        $data['productattributeList'] = $productattributeList;
        $data['selectedProductAttribute'] = $selectedProductAttribute;

        $productattributevalueList = ProductAttributeValue::pluck('attributevalue', 'id');
        $selectedProductAttributeValue = 1;

        $data['productattributevalueList'] = $productattributevalueList;
        $data['selectedProductAttributeValue'] = $selectedProductAttributeValue;

        return view('theme.backend.pages.product.variant.create', $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'description' => 'required|max:255',
            'product' => 'required',
            //'status' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'shipping' => 'required',
            'currency' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.product.variant.create'))
                ->withInput()
                ->withErrors($validator);
        }

        $productvariant = new ProductVariant;
        
        $productvariant->product_id = $request->product;
        $productvariant->sku = $request->sku;
        $productvariant->price = $request->price;
        $productvariant->tax = $request->tax;
        $productvariant->shipping = $request->shipping;
        $productvariant->currency = $request->currency;
        $productvariant->quantity = $request->quantity;

        $productvariant->name = $request->name;
        $productvariant->description = $request->description;
        //$productvariant->product_variant_status_id = $request->status;
        $productvariant->save();


        $productvariantattributevalue = new ProductVariantAttributeValue;
        
        $productvariantattributevalue->product_sku = $request->sku;
        $productvariantattributevalue->product_attribute_id = $request->productattribute;
        $productvariantattributevalue->product_attribute_value_id = $request->productattributevalue;

        $productvariantattributevalue->save();



        return redirect(route('admin.product.variant.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariant $productVariant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVariant $productVariant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVariant $productVariant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductVariant  $productVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariant $productVariant)
    {
        //
    }
    public function datatable()
    {
        $statuses = [ 0 => "Disabled", 1 => "Active"];

        $productvariants = ProductVariant::with(['user']);

        return Datatables::of($productvariants)
        ->addColumn('delete', function($data){ return '<a href="'.URL::route('admin.product.variant.destroy',$data->id).'">Delete</a>'; })
        //->editColumn('zone_status_id', '{{ $zone_status_id }}')
        //->addColumn('status',function ($product) { return $product->status->name; } )
        //->editColumn('status',function ($product) { return $product->status->name; } )
        ->make(true);
    }
}
