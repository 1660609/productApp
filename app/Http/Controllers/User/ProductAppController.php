<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use App\Models\View;
use App\Models\Gallery;
use App\Models\Variant;
use Auth;

class ProductAppController extends Controller
{
    public function index(Request $request)
    {
        //
        $key = "";
        $view = "";
        $product = Product::limit(5)->get();
         //$category = Category::all();
        if(isset(Auth::user()->id))
        {
            $view = View::with('product')->where('user_id',Auth::user()->id)->get();
        }
        return view('welcome',compact('product','key','view'));
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

        $variant =  Variant::select('img_color')->where('product_id',$id)->get();
        $gallery = Gallery::select('gallery_path')->where('product_id',$id)->get();

        $img = [];
        
        $key_variant = [];
        foreach($variant as $key=>$value)
        {
            $img[] = $value->img_color ; 
            $key_variant[] = $key;
        }
        foreach($gallery as $value)
        {
            $img[] = $value->gallery_path;
        }

        //dd($key_variant);
        //dd($img);

        $product = Product::with('galleries','category','variant')->find($id);
        $seeMore = Product::where('category_id',$product->category_id)->get();
        if(isset(Auth::user()->id))
        {
          $view = View::updateOrCreate(['user_id'=>Auth::user()->id,'product_id'=>$id],
                                     ['view'=>'1']);  
        }
        
        
        return view('user.detail',compact('product','seeMore','img'));
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
