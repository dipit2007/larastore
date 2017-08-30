<?php

namespace App\Http\Controllers;

use App\ProductVariantImage;
use Illuminate\Http\Request;

use App\Product;
use App\ProductVariant;

use Validator;

use Yajra\Datatables\Datatables;

use URL;

use Carbon\Carbon;

class ProductVariantImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = "productvariantimage";
        $data['submenu'] = "productvariantimagelist";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";
        
        $data['contentCardHeaderTitle'] = "PRODUCT VARIANT IMAGE LIST";


        return view('theme.backend.pages.product.variant.image.list', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = "productvariantimage";
        $data['submenu'] = "productvariantimagecreate";

        $data['pageTitle'] = "PRODUCT";
        $data['smallPageTitle'] = "";

        $data['contentCardHeaderTitle'] = "CREATE PRODUCT VARIANT IMAGE";

        $productList = Product::pluck('name', 'id');
        $selectedProduct = 1;

        $data['productList'] = $productList;
        $data['selectedProduct'] = $selectedProduct;

        $productvarianList = ProductVariant::pluck('sku', 'id'); //array(); //ProductVariant::lists('sku', 'sku')->all(); // Product::pluck('name', 'id');
        $selectedProductVariant = 1;

        $data['productvarianList'] = $productvarianList;
        $data['selectedProductVariant'] = $selectedProductVariant;

        return view('theme.backend.pages.product.variant.image.create', $data );
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
            'image' => 'required',
            //'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.product.variant.image.create'))
                ->withInput()
                ->withErrors($validator);
        }

        $product_variant_id = $request->productvariantsku;

        $productvariantimage = new ProductVariantImage;
        
        $productvariantimage->product_id = $request->product;
        $productvariantimage->product_variant_id = $product_variant_id;

        $productvariant = ProductVariant::findOrFail($product_variant_id);

        $productvariantimage->product_sku = $productvariant->sku;

        $productvariantimage->title = $request->title;
        $productvariantimage->description = $request->description;

        //$productvariantimage->product_variant_image_status_id = $request->status;

        if( $request->hasFile('image') && $request->file('image')->isValid() ) {

            $file = $request->file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $productvariantimage->filepath = $name;

            $file->move(public_path().'/storage/', $name);
        }

        $productvariantimage->save();

        return redirect(route('admin.product.variant.image.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductVariantImage  $productVariantImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariantImage $productVariantImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductVariantImage  $productVariantImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVariantImage $productVariantImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductVariantImage  $productVariantImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVariantImage $productVariantImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductVariantImage  $productVariantImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariantImage $productVariantImage)
    {
        //
    }
    public function datatable()
    {
        $statuses = [ 0 => "Disabled", 1 => "Active"];

        $productvariantimages = ProductVariantImage::with(['user']); 

        return Datatables::of($productvariantimages)
        ->addColumn('delete', function($data){ return '<a href="'.URL::route('admin.product.variant.image.destroy',$data->id).'">Delete</a>'; })
        //->editColumn('zone_status_id', '{{ $zone_status_id }}')
        //->editColumn('product_variant_image_status_id',function ($zone) { return $zone->product_variant_image_status_id; } )
        ->addColumn('status',function ($data) { return $data->product_variant_image_status; } )
        ->make(true);
    }
}
