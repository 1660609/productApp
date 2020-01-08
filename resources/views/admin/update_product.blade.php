@extends('layouts.master')
@section('sidebar')
  @include('layouts.sidebar')
@endsection
@section('content')
<div class="col-lg-10 float-right mt-3">
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
    <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text"  id="inputGroup-sizing-default">Address</span>
      </div>
      <select class="form-control" name="address">
      <option value="{{$product->address}}">{!!old('title',isset($product) ? $product->address : null)!!}</option>       
        <option value="An Giang">An Giang
        <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu
        <option value="Bắc Giang">Bắc Giang
        <option value="Bắc Kạn">Bắc Kạn
        <option value="Bạc Liêu">Bạc Liêu
        <option value="Bắc Ninh">Bắc Ninh
        <option value="Bến Tre">Bến Tre
        <option value="Bình Định">Bình Định
        <option value="Bình Dương">Bình Dương
        <option value="Bình Phước">Bình Phước
        <option value="Bình Thuận">Bình Thuận
        <option value="Bình Thuận">Bình Thuận
        <option value="Cà Mau">Cà Mau
        <option value="Cao Bằng">Cao Bằng
        <option value="Đắk Lắk">Đắk Lắk
        <option value="Đắk Nông">Đắk Nông
        <option value="Điện Biên">Điện Biên
        <option value="Đồng Nai">Đồng Nai
        <option value="Đồng Tháp">Đồng Tháp
        <option value="Đồng Tháp">Đồng Tháp
        <option value="Gia Lai">Gia Lai
        <option value="Hà Giang">Hà Giang
        <option value="Hà Nam">Hà Nam
        <option value="Hà Tĩnh">Hà Tĩnh
        <option value="Hải Dương">Hải Dương
        <option value="Hậu Giang">Hậu Giang
        <option value="Hòa Bình">Hòa Bình
        <option value="Hưng Yên">Hưng Yên
        <option value="Khánh Hòa">Khánh Hòa
        <option value="Kiên Giang">Kiên Giang
        <option value="Kon Tum">Kon Tum
        <option value="Lai Châu">Lai Châu
        <option value="Lâm Đồng">Lâm Đồng
        <option value="Lạng Sơn">Lạng Sơn
        <option value="Lào Cai">Lào Cai
        <option value="Long An">Long An
        <option value="Nam Định">Nam Định
        <option value="Nghệ An">Nghệ An
        <option value="Ninh Bình">Ninh Bình
        <option value="Ninh Thuận">Ninh Thuận
        <option value="Phú Thọ">Phú Thọ
        <option value="Quảng Bình">Quảng Bình
        <option value="Quảng Bình">Quảng Bình
        <option value="Quảng Ngãi">Quảng Ngãi
        <option value="Quảng Ninh">Quảng Ninh
        <option value="Quảng Trị">Quảng Trị
        <option value="Sóc Trăng">Sóc Trăng
        <option value="Sơn La">Sơn La
        <option value="Tây Ninh">Tây Ninh
        <option value="Thái Bình">Thái Bình
        <option value="Thái Nguyên">Thái Nguyên
        <option value="Thanh Hóa">Thanh Hóa
        <option value="Thừa Thiên Huế">Thừa Thiên Huế
        <option value="Tiền Giang">Tiền Giang
        <option value="Trà Vinh">Trà Vinh
        <option value="Tuyên Quang">Tuyên Quang
        <option value="Vĩnh Long">Vĩnh Long
        <option value="Vĩnh Phúc">Vĩnh Phúc
        <option value="Yên Bái">Yên Bái
        <option value="Phú Yên">Phú Yên
        <option value="Tp.Cần Thơ">Tp.Cần Thơ
        <option value="Tp.Đà Nẵng">Tp.Đà Nẵng
        <option value="Tp.Hải Phòng">Tp.Hải Phòng
        <option value="Tp.Hà Nội">Tp.Hà Nội
        <option value="TP  HCM">TP HCM                              
      </select>
  </div>
    <img src="/upload/thumbnail/{{$product->thumbnail}}" class="img-thumbnail" >
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"  id="inputGroup-sizing-default">Image Thumbnail</span>
        </div>
        <input type="file" name="thumbnail" class="form-control">
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
</div>
</div>
</div>
@endsection