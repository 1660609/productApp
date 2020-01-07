<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Detail;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Validator;

class ProductManage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with('galleries');
        if($request->nameSrc)
        {
            $products->where('name','like','%'.$request->nameSrc.'%');
        }
        if($request->descriptionSrc)
        {
            $products->where('description','like','%'.$request->descriptionSrc.'%');
        }
        if($request->contentSrc)
        {
            $products->where('content','like','%'.$request->contentSrc.'%');
        }
        $products = $products->get();
        $categories = Category::all();
        //dd($products);
        return view('admin.show_product',compact('products','categories'));
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
    public function store(ProductRequest $request)
    {
        //dd($request->category_id);
        $img = $request->file('thumbnail');
        $filename = time().'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(780,100)->save(public_path('upload/thumbnail/'.$filename));
        $thumbnail = $filename ;
        $data = [
            'category_id'=>$request->category_id,
            'name'=> $request->name,
            'description'=>$request->description,
            'content'=>$request->content,
            'address'=>$request->address,
            'thumbnail'=>$thumbnail,
            'price'=>(int)$request->price,
        ];
        $product = Product::create($data);
        $product->category_id = $request->category_id;
        $product->save();

        if($request->hasFile('gallery'))
        {
            
            $allowedfileExtension=['jpg','png','jpeg','gif','svg'];
            $exe_flg = true;
            foreach($request->file('gallery') as $image){
                $extension = $image->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if(!$check) {
					$exe_flg = false;
					break;
                }
                if($exe_flg)
                {
                        $filename = time().'.'.$image->getClientOriginalExtension();
                        $size = $image->getClientsize(); 
                        Image::make($image)->resize(300,300)->save(public_path('upload/gallery/'.$filename));
                        $gallery = $filename;
                        $galleryProduct = new Gallery([
                            'product_id'=>$product->id,
                            'gallery_path'=>$gallery,
                            'gallery_size'=>$size,
                        ]);
                        $galleryProduct->save();
                }   
            }
        }
        return response()->json(['success'=>'Add successfull product']);
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
        $product = Product::with('galleries')->find($id);
        $categories = Category::all();
        return view('admin.update_product',compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
        //dd($request->all());
        $product = Product::find($id);
        if($request->file('thumbnail'))
        {
            $img = $request->file('thumbnail');
            $filename = time().'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save(public_path('upload/thumbnail/'.$filename));
            $thumbnail = $filename;  
            $product->thumbnail =$filename;
        }
        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
            'content'=>$request->content,
            'price'=>$request->price,
        ];
        $product->category_id = $request->category_id;
        $product->update($data);
        $product->save();

        if($request->hasfile('gallery'))
        {
            $allowedfileExtension = ['jpg','png','jpeg','gif','svg'];
            $exe_flg = true;
            foreach($request->file('gallery') as $image){
                $extension = $image->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if(!$check) {
					$exe_flg = false;
					break;
                }
                if($exe_flg)
                {
                        $filename = time().'.'.$image->getClientOriginalExtension();
                        $size = $image->getClientsize(); 
                        Image::make($image)->resize(300,300)->save(public_path('upload/gallery/'.$filename));
                        $gallery = $filename;
                        $galleryProduct = new Gallery([
                            'product_id'=>$product->id,
                            'gallery_path'=>$gallery,
                            'gallery_size'=>$size,
                        ]);
                        $galleryProduct->save();
                }   
            }
        }
        return back()->with('success','Update successfully product');
        
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
        $product = Product::find($id);
        $product->delete();
        return back();
    }
    public function deleteGallery($id)
    {
        $gallery = Gallery::find($id);
            if(!empty($gallery)){
                $img = public_path('/upload/gallery/'.$gallery->gallery_path);
                if(File::exists($img)){
                    File::delete($img);  
                }
                $gallery->delete();
            }
            return "oke";
    }
}
