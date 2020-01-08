@extends('layouts.master')
@section('sidebar')
  @include('layouts.sidebar')
@endsection
@section('css')
<style>
.variant{
    -moz-box-shadow: 3px 3px 5px 0px #666;
    -webkit-box-shadow: 3px 3px 5px 0px #666;
    box-shadow: 3px 3px 5px 0px #666;
}
.variant-content{
    border: navy;
    border-style: solid;
}
</style>
@endsection
@section('content')
        <div class="col-lg-10 h-100 float-right mt-1 variant ">
            <nav aria-label="breadcrumb" class="mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('product.index')}}">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('variant.edit',$product->id)}}">Variant</a></li>
                </ol>
            </nav>
            <div class="col-lg-12 mt-1 ml-auto mr-auto pl-0 pr-0" style="background-color: cornflowerblue;height: 90%;">
                <h3 class="pt-3 pl-3" style="color: white;">Variant {{$product->name}}</h3>
                <hr width="100%" style="border:white;border-style: solid">
                <div class="col-lg-10 ml-auto mr-auto mb-0 mt-5 variant-content" style="background-color: white;">
                    <form action="{{route('variant.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12 mt-5 pl-4 pr-4 pt-4 pb-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text" style="background-color: navy;color: white;">Color</span>
                                </div>
                                <input class="form-control" type="text" id="color" name="color"/>
                                <script>
                                    $('#color').colorpicker({});
                                </script>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text" style="background-color: navy;color: white;">Size Product</span>
                                </div>
                                <input class="form-control" type="text" name="size" />
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background-color: navy;color: white;" id="inputGroup-sizing-default">Image Color Of Product</span>
                                </div>
                                <input type="file" name="img_color" class="form-control">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text" style="background-color: navy;color: white;">Price Product</span>
                                </div>
                                <input class="form-control" type="number" min="1" name="price" />
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend" >
                                    <span class="input-group-text" style="background-color: navy;color: white;">Quantity Product</span>
                                </div>
                                <input class="form-control" type="number" min="1" name="quantity" />
                            </div>
                        </div>
                        <div class="pl-4 pb-4">
                            <input value="{{$product->id}}" name="product_id" hidden>
                            <button class="btn btn-info" type="submit">+ Add Variant</button>
                        </div>
                    </form>
                    
                    
                </div>

            </div>
        </div>
    </div>
</div>
        
@endsection