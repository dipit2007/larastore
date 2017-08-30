<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;

use Validator;

use Yajra\Datatables\Datatables;

use URL;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = "category";
        $data['submenu'] = "categorylist";

        $data['pageTitle'] = "CATEGORY";
        $data['smallPageTitle'] = "";
        
        $data['contentCardHeaderTitle'] = "CATEGORY LIST";


        return view('theme.backend.pages.category.list', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = "category";
        $data['submenu'] = "categorycreate";

        $data['pageTitle'] = "CATEGORY";
        $data['smallPageTitle'] = "";

        $data['contentCardHeaderTitle'] = "CREATE CATEGORY";

        return view('theme.backend.pages.category.create', $data );
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
            return redirect(route('admin.category.create'))
                ->withInput()
                ->withErrors($validator);
        }

        $category = new ProductCategory;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = 1;
        $category->save();

        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
    public function datatable()
    {
        $statuses = [ 0 => "Disabled", 1 => "Active"];

        $zones = ProductCategory::with(['user']);//->select();

        return Datatables::of($zones)
        ->addColumn('delete', function($data){ return '<a href="'.URL::route('admin.category.destroy',$data->id).'">Delete</a>'; })
        //->editColumn('zone_status_id', '{{ $zone_status_id }}')
        ->editColumn('status',function ($zone) { return $zone->status; } )
        ->make(true);
    }
}
