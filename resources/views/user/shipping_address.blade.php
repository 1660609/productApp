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
                            <tr>
                                <th scope="row">1</th>
                                <td><a href="">Mark</a></td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>
                                    <div class="text-center">
                                        <input type="radio" >
                                    </div>
                                </td>
                                <td>
                                    <div class="row text-center " style="overflow: auto;">
                                        <div style="width: 50%;padding-left: 4px;">
                                            <form action="" method="">
                                                <button type="submit" class="btn btn-outline-primary" ><i class="fa fa-cog"></i></button>
                                            </form>
                                        </div>
                                        <div style="width: 50%;">
                                            <form action="" method="">
                                                <button type="submit" class="btn btn-outline-danger" ><i class="fa fa-trash"></i></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
@endsection