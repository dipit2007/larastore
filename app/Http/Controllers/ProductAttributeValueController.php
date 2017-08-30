<?php

namespace App\Http\Controllers;

use App\ProductAttributeValue;
use Illuminate\Http\Request;

use Validator;

use Yajra\Datatables\Datatables;

use URL;

use App\Product;
use App\ProductAttribute;


class ProductAttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = "productattributevalue";
        $data['submenu'] = "productattributevaluelist";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";
        
        $data['contentCardHeaderTitle'] = "PRODUCT ATTRIBUTE VALUE LIST";


        return view('theme.backend.pages.product.attribute.value.list', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = "productattributevalue";
        $data['submenu'] = "productattributevaluecreate";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";

        $data['contentCardHeaderTitle'] = "CREATE PRODUCT ATTRIBUTE VALUE";

        $productList = Product::pluck('name', 'id');
        $selectedProduct = 1;

        $data['productList'] = $productList;
        $data['selectedProduct'] = $selectedProduct;

        $productAttributeList = ProductAttribute::pluck('name', 'id');
        $selectedProductAttribute = 1;

        $data['productAttributeList'] = $productAttributeList;
        $data['selectedProductAttribute'] = $selectedProductAttribute;

        return view('theme.backend.pages.product.attribute.value.create', $data );
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
            'value' => 'required|max:50',
            'description' => 'required|max:255',
            'product' => 'required',
            'productattribute' => 'required',
            //'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.product.attribute.value.create'))
                ->withInput()
                ->withErrors($validator);
        }

        $productattributevalue = new ProductAttributeValue;
        $productattributevalue->attributevalue = $request->value;
        $productattributevalue->description = $request->description;
        $productattributevalue->product_id = $request->product;
        $productattributevalue->product_attribute_id = $request->productattribute;
        //$productattributevalue->product_attribute_value_status_id = $request->status;
        $productattributevalue->save();

        return redirect(route('admin.product.attribute.value.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductAttributeValue  $productAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttributeValue $productAttributeValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductAttributeValue  $productAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttributeValue $productAttributeValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAttributeValue  $productAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttributeValue $productAttributeValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAttributeValue  $productAttributeValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttributeValue $productAttributeValue)
    {
        //
    }
    public function datatable()
    {
        $statuses = [ 0 => "Disabled", 1 => "Active"];

        $productattributevalues = ProductAttributeValue::with(['user']);

        return Datatables::of($productattributevalues)
        ->addColumn('delete', function($data){ return '<a href="'.URL::route('admin.product.attribute.value.destroy',$data->id).'">Delete</a>'; })
        //->editColumn('zone_status_id', '{{ $zone_status_id }}')
        //->addColumn('status',function ($product) { return $product->status->name; } )
        //->editColumn('status',function ($product) { return $product->status->name; } )
        ->make(true);
    }
}
