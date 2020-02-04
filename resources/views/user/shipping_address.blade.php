@extends('layouts.master')
@section('sidebar')
    @include('layouts.sidebar_user')
@endsection
@section('poster')

@endsection
@section('css')
<style>
    .profile{
       overflow-y: auto;
       background-color: wheat;
       min-height: auto;
       height: auto;
       padding-bottom: 4rem;
    }
    .headeruser{
        text-align: center;
        background-color:white;
        border-bottom-style:solid ;
        border-bottom: black;
    }
    .image {
    opacity: 1;
    display: block;
    width: 100%;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
    }
    .imguser{
        position: relative;
        width: 200px;
        text-align: center;
        margin-left: 41%;
        
    }
    .middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    width: 180px;
    top:50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
    }

    .imguser:hover .image {
    opacity: 0.3;
    }

    .imguser:hover .middle {
    opacity: 1;
    }

    .text {
    color: black;
    font-size: 16px;
    padding: 16px 32px;
    }
    .option{
        padding-top: 2%;
        min-height: 700px; 
        height:auto;
        background-color: white;
       
    }
    .option ul{
        padding-left: 15px;
        list-style:none;
    }
    .option li:hover {
        background-color: burlywood;
    }
    .infouser{
        margin-left: 5px;
        min-height: 700px; 
        margin-bottom: 5px;
    }
    .headerinfo{ 
        background-color: darkslateblue;
        color: white;
        height: 5%;
        margin-bottom: 4px;
    }
    .contentinfo{
        font-size: small;
        background-color: white;
        height: auto ;
    }
    .delivery{
        background-color:  white;
        margin-bottom: 4px;
        padding-bottom: 4px;
       /* font-size: small; */
    }
    .delivery input{
        border: none;
    }
    .purchased{
        background-color: white;
        padding-bottom: 4px;
        height: auto;
        margin-bottom: 10px;
    }
    #basic-addon1{
        background-color: darkslateblue;
        color: white;
    }
    .address{
        background-color: white;
    }
</style>
@endsection
@section('content')
<div class="container-fluid profile">
    <div class="row h-100">
        <form action="" method="GET" enctype="multipart/form-data" class="text-center ml-auto mr-auto pt-3 pb-2 mt-0 w-100 mb-2 headeruser">
            <div class="imguser">
                <img src="/upload/avatar/default.jpg"  width="200px" height="200px" style="border-radius: 50%;border: black;border-style: solid;">
                <div class="middle">
                    <div class="text">
                        <div class="file">
                            <label class="file-label">
                            <input class="file-input" type="file" name="avatar" hidden>
                            <span class="file-cta">
                                <span class="file-icon">
                                <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                Choose
                                </span>
                            </span>
                            </label>
                        </div>
                        <input class="btn btn-outline-success" type="submit">
                    </div>
                </div>
                <h5>{{Auth::user()->name}}</h5>
            </div>
        </form>
        @include('layouts.sidebar_profile')
        <div class="col-8 col-md-8 col-lg-8 col-xl-8 infouser p-0">
           <div class="p-2 mb-2" style="background-color: white;">
               <h5><strong>Address management</strong></h5>
           </div>
           <div class="address p-4">
               <div class="text-right">
                    <a href="{{route('address.create')}}">
                        <button type="submit" class="btn btn-outline-success" ><i class="fa fa-plus"></i></button>
                    </a>
               </div>
                <div class="row p-4" >
                    <div class="table-responsive h-25">
                        <table class="table table-bordered">
                            <caption>List of product purchased</caption>
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Recipient's name</th>
                                <th scope="col">Number Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Default</th>
                                <th scope="col">Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                               
                            @foreach($address as $ad)
                            <tr>
                                <th scope="row">{{$ad->id}}</th>
                                <td>{{$ad->name}}</td>
                                <td>{{$ad->phone}}</td>
                                <td>{{$ad->address}}</td>
                                <td>
                                    <div class="text-center">
                                    @if($ad->default == 1)
                                        <input type="radio" checked='true' disabled >
                                    @else
                                        <input type="radio" disabled >
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="row text-center " style="overflow: auto;">
                                        <div style="width: 50%;padding-left: 4px;">
                                            <form action="" method="">
                                                <button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#myModal{{$ad->id}}"><i class="fa fa-cog"></i></button>
                                            </form>
                                        </div>
                                        <div style="width: 50%;">
                                            <form action="{{route('address.destroy',$ad->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('You want to delete the address')"><i class="fa fa-trash"></i></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                            <div id="myModal{{$ad->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                              
                                  <!-- Modal content-->
                                  <form action="{{route('address.update',$ad->id)}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Address</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="contianer">
                                          <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                  </div>
                                                  <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="name" value="{{$ad->name}}" placeholder="Full name" required>
                                                  <div class="invalid-feedback">
                                                    Please choose a username.
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                  </div>
                                                  <input class="form-control" type="tel"  value="{{$ad->phone}}" name="phone" id="phone-mask" placeholder="(___) ___ ____" require>
                                                  <script type="text/javascript">
                                                   var phoneMask = IMask(
                                                      document.getElementById('phone-mask'), {
                                                          mask: '+{84}(000)000-0000'
                                                      });
                                                  </script>
                                                  <div class="invalid-feedback">
                                                    Please choose a number phone.
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                  </div>
                                                  <input type="text" class="form-control" id="validationCustomUsername" value="{{$ad->address}}" aria-describedby="inputGroupPrepend" name="address" placeholder="Address" required>
                                                  <div class="invalid-feedback">
                                                    Please choose a address.
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-md-12 mb-3">
                                                  <label for="default">Default </label>
                                                @if($ad->default == 1)
                                                <input type="checkbox" name="default" checked="true">
                                                @else
                                                <input type="checkbox" name="default">
                                                @endif
                                              </div>
                                          </div>
                            
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-default float left" data-dismiss="modal">Close</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success float-right">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </form>
                                </div>
                              </div>
                            
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>


<!-- modal edit -->


@endsection
