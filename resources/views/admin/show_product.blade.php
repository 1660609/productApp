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
                      <form action="{{route('product.edit',$product->id)}}" method="GET">
                        <button type="submit" class="btn btn-default btn-sm">
                          <span class="octicon-pencil"></span> Edit
                        </button>
                      </form>
                      <form action="{{route('product.destroy',$product->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-default btn-sm" onclick="return confirm('You want to delete the product {{$product->name}}')">
                          <span class="octicon-pencil"></span> Delete
                        </button> 
                      </form>
                      <form action="" method="">
                        <button type="submit " class="btn btn-success" >
                          <span class="octicon-pencil"></span> Variant
                        </button>
                      </form>
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
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Category</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="category_id">
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
    <script type="text/javascript">
    const pickr1 = new Pickr({
      el: '#color-picker-1',
      default: "303030",
      components: {
        preview: true,
        opacity: true,
        hue: true,

        interaction: {
          hex: true,
          rgba: true,
          hsla: true,
          hsva: true,
          cmyk: true,
          input: true,
          clear: true,
          save: true
        }
      }
    });
    </script>
    </div>
  </div>
@endsection