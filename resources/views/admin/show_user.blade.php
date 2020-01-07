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
<div>
        <h3>User Manage</h3>
    </div>
    <hr width="100%">
    <button class="btn btn-primary" style="float:right;margin-right:10px" type="submit" id="addUser">+ Add User</button>
    <form action="{{route('user.index')}}">
      @csrf
      <div class="form-group">
        <input type="text" name="nameSrc" placeholder="Name user">
        <input type="text" name="emailSrc" placeholder="Email user">
        <button class="btn btn-primary">Sreach</button>
    </div>
    </form>
    <div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <th scope="col">Stt</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Setting</th>
            </thead>
            <tbody>
              @foreach ($user as $p)

                <tr>
                    <th scope="row"><a href="{{route('profile.edit',$p->id)}}">{{$p->id}}</a></th>
                    <td>{{$p->name}}</td>
                    <td>{{$p->email}}</td>
                    <td>
                    </td>
                    <td>
                      <form action="{{route('user.edit',$p->id)}}" method="GET">
                        <button type="submit" class="btn btn-default btn-sm" class="editCategory">
                          <span class="octicon-pencil"></span> Edit
                        </button>
                      </form>
                      <form action="{{route('user.destroy',$p->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-default btn-sm" onclick="return confirm('You want to delete the user {{$p->name}}')">
                          <span class="octicon-pencil"></span> Delete
                        </button>
                      </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>

    <div id="myModal" class="modal">
    <form  id="addForm" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="modal-content">
        <span class="close">&times;</span>
        
        <div class="alert alert-danger print-error-msg" style="display:none">
        <span class="close">&times;</span>
          <ul></ul>
      </div>
        <div class="alert " id="message" style="display: none"></div>
        <h4>Add User </h4>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >Name</span>
                </div>
                <input type="text" class="form-control "  name="name" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >Email</span>
                </div>
                <input type="text" class="form-control" name="email" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >Password</span>
                </div>
                <input type="password" id="myInput" class="form-control" name="password" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                
            </div>
            <input type="checkbox" onclick="myFunction()">Show Password
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" >Confirm password</span>
                </div>
                <input type="password" class="form-control" name="c_password" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                @error('c_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>      
    </form>
    </div>
    <script>
        function myFunction(){
            var x = document.getElementById('myInput');
            if(x.type === "password"){
                x.type = "text";
            } else {
                x.type = "password" ;
            }
        }
    </script>
    <script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("addUser");
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
      $(document).ready(function(){
        $("#addForm").on('submit',function(e){
          e.preventDefault();
          $.ajax({
          url: "{{route('user.store')}}",
          type: "POST",
          dataType:'JSON',
          contentType: false,
          cache: false,
          processData: false,
          data: new FormData(this),
          success:  function(data) {
            if($.isEmptyObject(data.errors)){
              $('#message').css('display', 'block');
              $('#message').html(data.success+" please reload page");
              $('#message').removeClass('alert-danger')
              $('#message').addClass('alert-success');
              // alert(data.success);
            }
            else{
              $(".print-error-msg").css('display','none');
              $('#message').css('display', 'block');
              $('#message').html(data.errors);
              $('#message').addClass('alert-danger');
            }
            },
            error: function(xhr, status, error) {
              var err = JSON.parse(xhr.responseText); 
              $('#message').css('display', 'none');
              $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( err.errors, function( key, value ) {
                      $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                  });
                }
          });
        });
      });


    </script>

@endsection