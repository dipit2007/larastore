<?php

namespace App\Http\Controllers;

use App\ProductAttribute;
use Illuminate\Http\Request;


use App\Product;

use App\ProductBrand;
use App\ProductCategory;

use Validator;

use Yajra\Datatables\Datatables;

use URL;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = "productattribute";
        $data['submenu'] = "productattributelist";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";
        
        $data['contentCardHeaderTitle'] = "PRODUCT ATTRIBUTE LIST";


        return view('theme.backend.pages.product.attribute.list', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = "productattribute";
        $data['submenu'] = "productattributecreate";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";

        $data['contentCardHeaderTitle'] = "CREATE PRODUCT ATTRIBUTE";

        $productList = Product::pluck('name', 'id');
        $selectedProduct = 1;

        $data['productList'] = $productList;
        $data['selectedProduct'] = $selectedProduct;

        return view('theme.backend.pages.product.attribute.create', $data );
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
            'name' => 'required|max:50',
            'description' => 'required|max:255',
            'product' => 'required',
            //'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.product.attribute.create'))
                ->withInput()
                ->withErrors($validator);
        }

        $productattribute = new ProductAttribute;
        $productattribute->name = $request->name;
        $productattribute->description = $request->description;
        $productattribute->product_id = $request->product;
        //$productattribute->status = $request->status;
        $productattribute->save();

        return redirect(route('admin.product.attribute.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $productAttribute)
    {
        //
    }
    public function datatable()
    {
        $statuses = [ 0 => "Disabled", 1 => "Active"];

        $productattributes = ProductAttribute::with(['user']);

        return Datatables::of($productattributes)
        ->addColumn('delete', function($data){ return '<a href="'.URL::route('admin.product.attribute.destroy',$data->id).'">Delete</a>'; })
        //->editColumn('zone_status_id', '{{ $zone_status_id }}')
        //->addColumn('status',function ($product) { return $product->status->name; } )
        //->editColumn('status',function ($product) { return $product->status->name; } )
        ->make(true);
    }
}
