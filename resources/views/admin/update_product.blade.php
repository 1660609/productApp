@extends('layouts.master')
@section('sidebar')
  @include('layouts.sidebar')
@endsection
@section('css')
<style>
  .pro-detail{
    -moz-box-shadow: 3px 3px 5px 0px #666;
    -webkit-box-shadow: 3px 3px 5px 0px #666;
    box-shadow: 3px 3px 5px 0px #666;
  }
  .color-circle
  {
    height: 38px;
    width: 25px;
    display: inline-block;
  }
</style>
@endsection
@section('content')
<div class="col-lg-10 float-right mt-3">
<h3>Edit Product <h3>
<hr width="100%">
<div class="row">
 <div class="col-lg-10  pl-4 pr-4 pb-5 pt-2 ml-auto mr-auto pro-detail" >
  <div class="row">
    <div class="col-6 float-left">
      <h5 class="ml-2">Product Detail</h5>
    </div>
  </div>
  <hr width="100%">
<form action="{{route('product.update',$product->id)}}" method="POST"  enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="input-group mb-3 col-lg-6">
        <div class="input-group-prepend" >
            <span class="input-group-text" style="background-color: navy;color: white;">Name Product</span>
        </div>
        <input type="text" class="form-control"  placeholder="Name Category" name="name" value="{!!old('title',isset($product) ? $product->name : null)!!}">
      </div>
      <div class="input-group mb-3 col-lg-6">
        <div class="input-group-prepend">
            <span class="input-group-text" style="background-color: navy;color: white;"  id="inputGroup-sizing-default">Category</span>
        </div> 
        <select class="form-control" name="category_id">
          <option value="{{$product->category_id}}">{!!old('title',isset($product) ? $product->category_id : null)!!}</option>       
          @foreach ($categories as $c)
          <option value="{{$c->id}}">{{$c->id}} - {{$c->name}} </option>
          @endforeach       
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description Product</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{!!old('title',isset($product) ? $product->description : null)!!}</textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Content Product</label>
      <textarea class="ckeditor" name="content" rows="3">{!!old('title',isset($product) ? $product->content : null)!!}</textarea>
      <script>
        CKEDITOR.replace('content',
        {
            filebrowserBrowseUrl : '/editor/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '/editor/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : '/editor/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : '/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
      </script>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text"  id="inputGroup-sizing-default" style="background-color: navy;color: white;">Address</span>
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
            <span class="input-group-text"  id="inputGroup-sizing-default" style="background-color: navy;color: white;">Image Thumbnail</span>
        </div>
        <input type="file" name="thumbnail" class="form-control" >
    </div>

    <hr width="100%">
    <label for="exampleFormControlFile1">Image Gallery</label>

    <div class="form-group" style="display: flex; flex-direction: row;width:100%;height:auto;flex-wrap: wrap;" >
        <br>
        @if($product->galleries)
            @foreach ($product->galleries as $galleries)
            <div id = "{{$galleries->id}}" style="position: relative; padding-right:10px;">
                <img src="/upload/gallery/{{$galleries->gallery_path}}" width="100px" height="100px" id="{{$galleries->id}}" class="img-thumbnail" >
                <a id='del_gallery' href="javascript:void(0)" style="position: absolute;z-index:998;left:0rem; ">
                    <i class="fa fa-window-close" ></i>
                </a>
            </div>
            @endforeach
        @endif
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text"  id="inputGroup-sizing-default" style="background-color: navy;color: white;">Image Gallery</span>
      </div>
      <input type="file" name="gallery[]" class="form-control" multiple="multiple" id="exampleFormControlFile1">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend" >
          <span class="input-group-text" style="background-color: navy;color: white;">Price</span>
      </div>
      <input type="text" class="form-control"  placeholder="Price" name="price" value="{!!old('title',isset($product) ? $product->price : null)!!}">
    </div>
    <button type="submit" class="btn btn-primary">Update Category</button>
  </form>
</div> 
</div>
<div class="row mt-3">
<div  class="col-lg-10 ml-auto mr-auto pl-1 pr-1 pb-5 pt-2 pro-detail" >
  <div class="row">
    <div class="col-6 float-left">
      <h5 class="ml-2">Variant of Product</h5>
    </div>
    <div class="col-6 float-right">
      <a class="btn btn-outline-info btn-sm float-right" href="{{route('variant.edit',$product->id)}}" type="submit">
        <i class="fa fa-plus" aria-hidden="true"></i>
      </a>
    </div>
  
  </div>

  <hr width="100%">
  <div class="col-lg-12">
    <table class="table table table-bordered" style="font-size: 10px;">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Stt</th>
          <th scope="col">Color</th>
          <th scope="col">Size</th>
          <th scope="col">Image Color</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Setting</th>
        </tr>
      </thead>
      <tbody>
        @foreach($product->variant as $variant)
        <form action="{{route('variant.update',$variant->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <tr>
          <th scope="row">{{$variant->id}}</th>
          <td>
            <div class="input-group mb-3">
              <div class="input-group-prepend" >
                  <span class="color-circle" style='background-color: {{$variant->color}};color: white;'></span>
              </div>
              <input class="form-control" type="text" id="color" name="color" value="{{$variant->color}}"/>
              <script>
                  $('#color').colorpicker({});
              </script>
            </div>
          </td>
          <td>
            <div class="input-group mb-3">
              <input class="form-control" type="text" id="color" name="size" value="{{$variant->size}}"/>
            </div>
          </td>
          <td>
            <img src="/upload/variant/{{$variant->img_color}}" width="40px" height="40px">
            <div class="input-group mb-3"> 
              
              <div class="custom-file">
                <input type="file" name="img_color" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
              </div>
              
            </div>
          </td>
          <td>
            <div class="">
              <input type="number" class="form-control" name="price_variant" value="{{$variant->price}}">
            </div>
            
          </td>
          <td>
            <div class="col-10">
              <input type="number" class="form-control" name="quantity" value="{{$variant->quantity}}">

            </div>
          </td>
          <td style="width:15%">
            <div class="row float-right mr-2" style="width:80%">
              <button type="submit " class="btn btn-success btn-sm" title="add variant" >
                <i class="fa fa-wrench" aria-hidden="true"></i>
              </button>
            </form>
            <form action="{{route('variant.destroy',$variant->id)}}" method="POST" class="col-6">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('You want to delete the variant {{$variant->id}}')" title="delete product">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </button> 
            </form>
            </div>
              
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection