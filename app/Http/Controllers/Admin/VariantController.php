<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VariantRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Variant;


class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       //dd($request->all());
       $check = Variant::where('product_id',$request->product_id)
       ->where('color',$request->color)
       ->where('size',$request->size)->count();
       if($check >= 1)
       {
           return back()->with('warning','Variation already exists');
       }
       $variant = new Variant ; 
       $variant->product_id = $request->product_id;
       if($request->color)
       {
           $variant->color = $request->color;
       }
       if($request->size)
       {
           $variant->size = $request->size;
       }
       if($request->hasfile('img_color'))
       {
           $img = $request->file('img_color');
           $filename = time().'.'.$img->getClientOriginalExtension();
           Image::make($img)->resize(100,100)->save(public_path('upload/variant/'.$filename));
           $img_color = $filename ;
           $variant->img_color = $img_color;
       }
       if($request->price)
       {
           $variant->price = $request->price ; 
       }
       if($request->quantity)
       {
           $variant->quantity = $request->quantity;
       }
       $variant->save();
       return back()->with('success','Add success variant');
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
        $product = Product::find($id);
        return view('admin.variant',compact('product'));
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
        $variant = Variant::find($id);
        $variant->color = $request->color;
        $variant->size = $request->size;
        $variant->quantity = $request->quantity;
        $variant->price = $request->price_variant;
        if($request->hasfile('img_color'))
        {
           $img_path = public_path('/upload/gallery/'.$variant->img_color);
           if(File::exists($img_path))
            {
                File::delete($img_path);
            }
           $img = $request->file('img_color');
           $filename = time().'.'.$img->getClientOriginalExtension();
           Image::make($img)->resize(100,100)->save(public_path('upload/gallery/'.$filename));
           $img_color = $filename ;
           $variant->img_color = $img_color;
        }
        $variant->save();
        return back()->with('success','Updated variant');
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
        $variant = Variant::find($id);
        $img_path = public_path('/upload/gallery/'.$variant->img_color);
        if(File::exists($img_path))
        {
            File::delete($img_path);
        }
        else
        {
            return back()->with('error','File not exists');
        }
        $variant->delete();

        return back()->with('success','Deleted variant');

    }
}
