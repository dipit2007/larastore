<?php

namespace App\Http\Controllers;

use App\ProductBrand;
use Illuminate\Http\Request;

use Validator;

use Yajra\Datatables\Datatables;

use URL;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = "brand";
        $data['submenu'] = "brandlist";

        $data['pageTitle'] = "BRAND";
        $data['smallPageTitle'] = "";
        
        $data['contentCardHeaderTitle'] = "BRAND LIST";


        return view('theme.backend.pages.brand.list', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = "brand";
        $data['submenu'] = "brandcreate";

        $data['pageTitle'] = "BRAND";
        $data['smallPageTitle'] = "";

        $data['contentCardHeaderTitle'] = "CREATE BRAND";

        return view('theme.backend.pages.brand.create', $data );
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
            //'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.brand.create'))
                ->withInput()
                ->withErrors($validator);
        }

        $brand = new ProductBrand;
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = 1;
        $brand->save();

        return redirect(route('admin.brand.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBrand $productBrand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBrand $productBrand)
    {
        //
    }
    public function datatable()
    {
        $statuses = [ 0 => "Disabled", 1 => "Active"];

        $zones = ProductBrand::with(['user']);//->select();

        return Datatables::of($zones)
        ->addColumn('delete', function($data){ return '<a href="'.URL::route('admin.brand.destroy',$data->id).'">Delete</a>'; })
        //->editColumn('zone_status_id', '{{ $zone_status_id }}')
        ->editColumn('status',function ($zone) { return $zone->status; } )
        ->make(true);
    }
}
