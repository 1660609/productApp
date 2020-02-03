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
            <div class="headerinfo pt-1 pl-2">
                <h5 class="float-left"><strong>Information</strong></h5>
            </div>
            <div class="contentinfo text-center">
                <div class="col-10 col-md-10 col-lg-10 col-xl-10 ml-auto mr-auto" >
                    <form >
                        <div class="float-right w-100 text-right">
                            <span><input type="checkbox" id="change" >Change</span>    
                        </div>
                        <div class="pt-5 text-left pb-2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" title="Name" ></i></span>
                                </div>
                                <input class="form-control" type="text" value="{{Auth::user()->name}}" id="nameuser" name="name" disabled >
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-birthday-cake" title="Day of birth"></i></span>
                                </div> 
                                <input class="form-control" type="date" value="" name="DOB" id="dobuser" disabled> 
                            </div>                      
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" title="Number phone"></i></span>
                                </div> 
                                <input class="form-control" type="tel"  name="phone" id="phone-mask" placeholder="(___) ___ ____" disabled>
                                <script type="text/javascript">
                                 var phoneMask = IMask(
                                    document.getElementById('phone-mask'), {
                                        mask: '+{84}(000)000-0000'
                                    });
                                </script>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-book" title="Address"></i></span>
                                </div> 
                                <input class="form-control" type="text" id="address"  name="address" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                </div> 
                                <input class="form-control" type="text" id="password"  name="address" disabled>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-primary " id="submit" disabled>Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="contianer mt-2 delivery p-2">
                <div class="pb-3">
                    <h5><strong> Delivery address</strong></h5>
                </div>
                <form action="" method="">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 ml-auto mr-auto">
                        <div class="row">
                            <div class="col-sm-6 col-6 col-md-4 col-lg-3 col-xl-3">
                              <div class="card">
                                <div class="card-body">
                                <div class="float-right">
                                   <a><i class="fa fa-times-circle"></i></a>
                                </div>
                                   <h5 class="card-title">Your Name </h5>
                                <div>
                                    <p style="font-size: x-small;" class="card-text"><strong>Phone:  </strong><span><input value="+84 92 415 8055"></span></p>
                                </div>
                                <div style="font-size: 1px ;">
                                    <p style="font-size: x-small;" class="card-text"><strong>Address:</strong> tổ 7, ấp Tân Điền, xã Lý Nhơn, huyện Cần Giờ,tp Hồ Chí Minh</p>
                                </div>
                                </div>
                              </div>
                            </div>  
                            <div class="col-sm-6 col-6 col-md-4 col-lg-3 col-xl-3">
                                <div class="card">
                                  <div class="card-body">
                                  <div class="float-right">
                                     <a><i class="fa fa-times-circle"></i></a>
                                  </div>
                                     <h5 class="card-title">Your Name </h5>
                                  <div>
                                      <p style="font-size: x-small;" class="card-text"><strong>Phone:  </strong><span><input value="+84 92 415 8055"></span></p>
                                  </div>
                                  <div style="font-size: 1px ;">
                                      <p style="font-size: x-small;" class="card-text"><strong>Address:</strong> tổ 7, ấp Tân Điền, xã Lý Nhơn, huyện Cần Giờ,tp Hồ Chí Minh</p>
                                  </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6 col-md-4 col-lg-3 col-xl-3">
                                <div class="card">
                                  <div class="card-body">
                                  <div class="float-right">
                                     <a><i class="fa fa-times-circle"></i></a>
                                  </div>
                                     <h5 class="card-title">Your Name </h5>
                                  <div>
                                      <p style="font-size: x-small;" class="card-text"><strong>Phone:  </strong><span><input value="+84 92 415 8055"></span></p>
                                  </div>
                                  <div style="font-size: 1px ;">
                                      <p style="font-size: x-small;" class="card-text"><strong>Address:</strong> tổ 7, ấp Tân Điền, xã Lý Nhơn, huyện Cần Giờ,tp Hồ Chí Minh</p>
                                  </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6 col-md-4 col-lg-3 col-xl-3">
                                <div class="card">
                                  <div class="card-body">
                                  <div class="float-right">
                                     <a><i class="fa fa-times-circle"></i></a>
                                  </div>
                                     <h5 class="card-title">Your Name </h5>
                                  <div>
                                      <p style="font-size: x-small;" class="card-text"><strong>Phone:  </strong><span><input value="+84 92 415 8055"></span></p>
                                  </div>
                                  <div style="font-size: 1px ;">
                                      <p style="font-size: x-small;" class="card-text"><strong>Address:</strong> tổ 7, ấp Tân Điền, xã Lý Nhơn, huyện Cần Giờ,tp Hồ Chí Minh</p>
                                  </div>
                                  </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </form>
            </div>
            <div class="contianer purchased p-2">
                <div>
                    <h5 class="mb-2"><Strong>Products Purchased</Strong></h5>
                </div>
                <div class="row p-4" >
                    <div class="table-responsive h-25">
                        <table class="table">
                            <caption>List of product purchased</caption>
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name Product</th>
                                <th scope="col">Address</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                              </tr>
                            </thead>
                            <tbody>
                               <tr>
                                <th scope="row">1</th>
                                <td><a href="">Mark</a></td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>12223</td>
                              </tr> 
                          
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var change = document.getElementById('change');
    change.onchange = function(){

       if(change.checked == false)
       {   
            document.getElementById('nameuser').disabled = true;
            document.getElementById('dobuser').disabled = true;
            document.getElementById('phone-mask').disabled = true;
            document.getElementById('address').disabled = true;
            document.getElementById('submit').disabled = true;
       }
       if(change.checked == true)
       {
            document.getElementById('nameuser').disabled = false;
            document.getElementById('dobuser').disabled = false;
            document.getElementById('phone-mask').disabled = false;
            document.getElementById('address').disabled = false;
            document.getElementById('submit').disabled = false;
       }

    }
</script>
@endsection