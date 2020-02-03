<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variant;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = "";
        $srcPriceMax = "";
        $srcPriceMin = "";
        $srcAddress ="";
        $srcCate = "";
        //dd($request->srcCate);
        $product = Product::orderBy('id');
        if($request->key)
        {
            $key= $request->key ;
            $product = Product::where('name','like','%'.$key.'%')
            ->orWhere('description','like','%'.$key.'%');
        }
        if($request->srcCate)
        {
            $srcCate = $request->srcCate;
            $product = Product::where('category_id',$srcCate);
        }
        if($request->srcAddress)
        {
            $srcAddress = $request->srcAddress;
            $product = Product::where('address', $srcAddress);   
           
        }
        if($request->srcPriceMin)
        {
            $srcPriceMin = $request->srcPriceMin;
            $product = Product::where('price','>=', $srcPriceMin);
        }
        if($request->srcPriceMax)
        {
            $srcPriceMax = $request->srcPriceMax;
            $product = Product::where('price','<=',$srcPriceMax);
        }
        $product = $product->get();
        return view('user.result_product', compact('product','key','srcPriceMax','srcPriceMin','srcAddress','srcCate'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
