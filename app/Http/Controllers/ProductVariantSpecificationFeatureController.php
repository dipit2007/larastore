<?php

namespace App\Http\Controllers;

use App\ProductVariantSpecificationFeature;
use Illuminate\Http\Request;


use App\Product;
use App\ProductVariant;

use Validator;

use Yajra\Datatables\Datatables;

use URL;

class ProductVariantSpecificationFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = "productspecification";
        $data['submenu'] = "productspecificationlist";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";
        
        $data['contentCardHeaderTitle'] = "PRODUCT VARIANT SPECIFICATION LIST";


        return view('theme.backend.pages.product.variant.specification.list', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = "productspecification";
        $data['submenu'] = "productspecificationcreate";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";

        $data['contentCardHeaderTitle'] = "CREATE PRODUCT VARIANT SPECIFICATION";

        $productList = Product::pluck('name', 'id');
        $selectedProduct = 1;

        $data['productList'] = $productList;
        $data['selectedProduct'] = $selectedProduct;

        $productvarianList = ProductVariant::pluck('sku', 'id'); //array(); //ProductVariant::lists('sku', 'sku')->all(); // Product::pluck('name', 'id');
        $selectedProductVariant = 1;

        $data['productvarianList'] = $productvarianList;
        $data['selectedProductVariant'] = $selectedProductVariant;

        return view('theme.backend.pages.product.variant.specification.create', $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required',
            'productvariantsku' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            //'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.product.variant.specification.create'))
                ->withInput()
                ->withErrors($validator);
        }

        $product_variant_id = $request->productvariantsku;

        $productvariantspecification = new ProductVariantSpecificationFeature;
        
        $productvariantspecification->product_id = $request->product;
        $productvariantspecification->product_variant_id = $product_variant_id;

        $productvariant = ProductVariant::findOrFail($product_variant_id);

        $productvariantspecification->product_sku = $productvariant->sku;

        $productvariantspecification->title = $request->title;
        $productvariantspecification->description = $request->description;

        $productvariantspecification->product_variant_specification_status = 1;//$request->status;

        

        $productvariantspecification->save();

        return redirect(route('admin.product.variant.specification.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductSpecificationFeature  $productSpecificationFeature
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSpecificationFeature $productSpecificationFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductSpecificationFeature  $productSpecificationFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSpecificationFeature $productSpecificationFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductSpecificationFeature  $productSpecificationFeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSpecificationFeature $productSpecificationFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductSpecificationFeature  $productSpecificationFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSpecificationFeature $productSpecificationFeature)
    {
        //
    }
    public function datatable()
    {
        $statuses = [ 0 => "Disabled", 1 => "Active"];

        $productvariantspecificationfeatures = ProductVariantSpecificationFeature::with(['user']); 

        return Datatables::of($productvariantspecificationfeatures)
        ->addColumn('delete', function($data){ return '<a href="'.URL::route('admin.product.variant.specification.destroy',$data->id).'">Delete</a>'; })
        //->editColumn('zone_status_id', '{{ $zone_status_id }}')
        //->editColumn('product_variant_image_status_id',function ($zone) { return $zone->product_variant_image_status_id; } )
        ->addColumn('status',function ($data) { return $data->product_variant_specification_status; } )
        ->make(true);
    }
}
