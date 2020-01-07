@extends('layouts.master')
@section('sidebar')
  @include('layouts.sidebar')
@endsection
@section('content')
<h3>Edit Product <h3>
<hr width="100%">
<form action="{{route('product.update',$product->id)}}" method="POST" style="margin-left: 40px;margin-right: 250px;font-size: 20px;" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Name Product</label>
      <input type="text" class="form-control"  placeholder="Name Category" name="name" value="{!!old('title',isset($product) ? $product->name : null)!!}">
    </div>
    <select class="form-control" name="category_id">
       <option value="{{$product->category_id}}">{!!old('title',isset($product) ? $product->category_id : null)!!}</option>       
      @foreach ($categories as $c)
        <option value="{{$c->id}}">{{$c->id}} - {{$c->name}} </option>
      @endforeach
    </select>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description Product</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{!!old('title',isset($product) ? $product->description : null)!!}</textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Content Product</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{!!old('title',isset($product) ? $product->content : null)!!}</textarea>
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Image Thumbnail</label>
        <br>
        <img src="/upload/thumbnail/{{$product->thumbnail}}" class="img-thumbnail" >
        <input type="file" name="thumbnail" class="form-control-file" id="exampleFormControlFile1">
    </div>

    <hr width="100%">
    <label for="exampleFormControlFile1">Image Gallery</label>
    <div class="form-group" style="display: flex; flex-direction: row;width:100%;height:auto;flex-wrap: wrap;" >

        <br>
        @if($product->galleries)
            @foreach ($product->galleries as $galleries)
            <div id = "{{$galleries->id}}" style="position: relative; padding-right:10px;">
                <img src="/upload/gallery/{{$galleries->gallery_path}}" id="{{$galleries->id}}" class="img" >
                <a id='del_gallery' href="javascript:void(0)" style="position: absolute;z-index:998;left:17rem; ">
                    <i class="fa fa-window-close" ></i>
                </a>
            </div>
            @endforeach
        @endif
    </div>
    <input type="file" name="gallery[]" class="form-control-file" multiple="multiple" id="exampleFormControlFile1">
    <div class="form-group">
      <label for="exampleFormControlInput1">Price Product</label>
      <input type="text" class="form-control"  placeholder="Price" name="price" value="{!!old('title',isset($product) ? $product->price : null)!!}">
    </div>
    <button type="submit" class="btn btn-primary">Update Category</button>
  </form>
@endsection