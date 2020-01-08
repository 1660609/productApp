@extends('layouts.master')
@section('sidebar')
  @include('layouts.sidebar')
@endsection
@section ('css')
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
@endsection
@section('content')
<div class="col-lg-10 float-right mt-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="{{route('product.index')}}">Product</a></li>
    </ol>
  </nav>
    <h3>Product Manage</h3>
    <hr width="100%">
    <button class="btn btn-primary" style="float:right;margin-right:10px" type="submit" id="addProduct">+ Add Product</button>
    <form action="{{route('product.index')}}">
      @csrf
      <div class="form-group">
        <input type="text" name="nameSrc" placeholder="Name product">
        <input type="text" name="descriptionSrc" placeholder="Description product">
        <input type="text" name="contentSrc" placeholder="Content product">
        <button class="btn btn-primary">Sreach</button>
    </div>
    </form>
    <div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <th scope="col">Stt</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Content</th>
                <th scope="col">Address</th>
                <th scope="col">Gallery</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Price</th>
                <th scope="col">Setting</th>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->content}}</td>
                    <td>{{$product->address}}</td>
                    <td>
                    @foreach ($product->galleries as $g)
                        <img src="/upload/gallery/{{$g->gallery_path}}" height="70" width="70"> 
                    @endforeach
                    </td>
                    <td>
                      <img src="/upload/thumbnail/{{$product->thumbnail}}" height="70" width="150"> 
                    </td>
                    <td>{{$product->price}}</td>
                    <td>
                      <div class="row" style="width: 70%;text-align: center;">
                        <form action="{{route('product.edit',$product->id)}}" method="GET" class="col-4">
                          <button type="submit" class="btn btn-info btn-sm" title="edit product">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                          </button>
                        </form>
                        <form action="{{route('product.destroy',$product->id)}}" method="POST" class="col-4">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('You want to delete the product {{$product->name}}')" title="delete product">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </button> 
                        </form>
                        <form action="{{route('variant.edit',$product->id)}}" method="GET" class="col-4">
                          @csrf
                          <button type="submit " class="btn btn-success btn-sm" title="add variant" >
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
    <input class="form-control" type="text" id="color"/>
        <script>
            $('#color').colorpicker({});
        </script>
    <!-- Models create product -->
    <div id="myModal" class="modal">
    <form id="addForm" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-content" style="width:60%">
        <span class="close">&times;</span>
        <div class="alert alert-danger print-error-msg" style="display:none">
          <ul></ul>
      </div>
        <div class="alert " id="message" style="display: none"></div>
        <center><h4 style="margin-bottom: 40px;">Add Product </h4></center>
        <div class="row">
          <div class="col-12">
            <div class="col-8 ml-auto mr-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Name</span>
                    </div>
                    <input type="text" class="form-control" name="name" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text"  id="inputGroup-sizing-default">Category</span>
                  </div>
                    <select class="form-control" name="category_id">
                      @foreach ($categories as $c)
                      <option value="{{$c->id}}">{{$c->id}} - {{$c->name}} </option>
                      @endforeach
                    </select>
              </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  id="inputGroup-sizing-default">Description</span>
                    </div>
                    <input type="text" class="form-control" name="description" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  id="inputGroup-sizing-default">Content</span>
                    </div>
                    <input type="text" class="form-control" name="content" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text"  id="inputGroup-sizing-default">Address</span>
                  </div>
                    <select class="form-control" name="address">
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
                <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile04" name="gallery[]" multiple="multiple">
                    <label class="custom-file-label" for="inputGroupFile04">Choose image gallery product</label>
                </div>
                <br><br>
                </div>
                <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile04" name="thumbnail">
                    <label class="custom-file-label" for="inputGroupFile04">Choose image thumbnail</label>
                </div>
                </div>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  id="inputGroup-sizing-default">Price</span>
                    </div>
                    <input type="number" class="form-control" name="price" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
          </div>
          </div>

        
        <button type="submit" class="btn btn-primary">Add product</button>
    </div>      
    </form>
    </div>
    </div>
    <script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("addProduct");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
      modal.style.display = "block";
    }
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
    <script type="text/javascript">
    $('#addForm').on('submit',function(e){
      e.preventDefault();
      $.ajax({
        url: "{{route('product.store')}}",
        type: "POST",
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        data: new FormData(this),
        success: function(data){
          if(data.success){
            $('#message').css('display', 'block');
            $('.print-error-msg').css("display","none")
              $('#message').html(data.success+" please reload page");
              $('#message').removeClass('alert-danger')
              $('#message').addClass('alert-success');
          }
        },
        error: function(xhr,status, error){
          var err = JSON.parse(xhr.responseText);
          $('#message').css('display', 'block');
          $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( err.errors, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        },
      })

    })

    </script>
    </div>
  </div>
@endsection