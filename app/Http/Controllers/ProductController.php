<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\ProductBrand;
use App\ProductCategory;

use Validator;

use Yajra\Datatables\Datatables;

use URL;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = "product";
        $data['submenu'] = "productlist";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";
        
        $data['contentCardHeaderTitle'] = "PRODUCT LIST";


        return view('theme.backend.pages.product.list', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = "product";
        $data['submenu'] = "productcreate";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";

        $data['contentCardHeaderTitle'] = "CREATE PRODUCT";

        $brandList = ProductBrand::pluck('description', 'id');
        $selectedBrand = 1;

        $data['brandList'] = $brandList;
        $data['selectedBrand'] = $selectedBrand;

        $categoryList = ProductCategory::pluck('description', 'id');
        $selectedCategory = 1;

        $data['categoryList'] = $categoryList;
        $data['selectedCategory'] = $selectedCategory;


        return view('theme.backend.pages.product.create', $data );
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
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'brand' => 'required',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('product.create'))
                ->withInput()
                ->withErrors($validator);
        }

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->product_brand_id = $request->brand;
        $product->product_category_id = $request->category;
        $product->product_status_id = 1;
        $product->save();

        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function datatable()
    {
        $statuses = [ 0 => "Disabled", 1 => "Active"];

        $zones = Product::with(['user']);//->select();

        return Datatables::of($zones)
        ->addColumn('delete', function($data){ return '<a href="'.URL::route('admin.product.destroy',$data->id).'">Delete</a>'; })
        //->editColumn('zone_status_id', '{{ $zone_status_id }}')
        //->editColumn('status',function ($zone) { return $zone->status; } )
        ->make(true);
    }
}
