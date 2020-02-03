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
           <div class="contentinfo text-center">
            <div class="col-10 col-md-10 col-lg-10 col-xl-10 ml-auto mr-auto" >
                <form action="{{route('address.store')}}" method="POST">
                    @csrf
                    <div class="pt-5 text-left pb-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" title="Name" ></i></span>
                            </div>
                            <input class="form-control" type="text" value="{{Auth::user()->name}}" id="nameuser" name="name">
                        </div>              
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" title="Number phone"></i></span>
                            </div> 
                            <input class="form-control" type="tel"  name="phone" id="phone-mask" placeholder="(___) ___ ____">
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
                            <input class="form-control" type="text" id="address"  name="address">
                        </div>
                        <div class=" w-100 text-left pb-3">
                            <span><input type="checkbox" id="default" name="default" >Default</span>    
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-outline-primary w-100" id="submit" >Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection