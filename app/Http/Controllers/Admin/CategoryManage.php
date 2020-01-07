<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CategoryRequest;
use Auth;
use Validator;
use Response;

class CategoryManage extends Controller
{
    public function index(Request $request)
    {
        //
        $data = Category::orderBy('id');
        if($request->nameSrc)
        {
            $data = Category::where('name','like','%'.$request->nameSrc.'%');
        }
        if($request->descriptionSrc)
        {
            $data = Category::where('description','like','%'.$request->descriptionSrc.'%');
        }
        $data = $data->get();
        return view('admin.show_category',compact('data'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'banner'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2555',
            
        ]);
       
        if($validator->fails()){
            //dd($banner);
            return response()->json(['errors'=>$validator->errors()->all()]);
            
        }
        $img = $request->file('banner');
        $filename = time().'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(780,100)->save(public_path('upload/banner/'.$filename));
        $banner = $filename ;
        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
            'banner'=>$banner,
        ];
        $categories = Category::create($data) ;
        $categories->save();
        return response()->json(['success'=>'Add successfully category']);
       
        
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
    public function edit($id)
    {
        //
        $data = Category::find($id); 
        return view('admin.update_category',compact('data'));
    }
    public function update(CategoryRequest $request, $id)
    {
        //
        $category = Category::find($id);
        if($request->file('banner'))
        {
            $errors = $request->validate([
                'banner'=>'image|mimes:jpeg,png,jpg,gif,svg|max:6048'
            ]);
            $img = $request->file('banner');
            $filename = time().'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(900,120)->save(public_path('upload/banner/'.$filename));
            //dd($filename);
            $category->banner = $filename;
        }
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return back();
    }
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $category->delete();
        return back();
    }
}
