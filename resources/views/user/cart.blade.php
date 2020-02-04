@extends('layouts.master')
@section('sidebar')
    @include('layouts.sidebar_user')
@endsection
@section('css')
<style>
    .bloc_left_price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 150%;
}
.category_block li:hover {
    background-color: #007bff;
}
.category_block li:hover a {
    color: #ffffff;
}
.category_block li a {
    color: #343a40;
}
.add_to_cart_block .price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 200%;
    margin-bottom: 0;
}
.add_to_cart_block .price_discounted {
    color: #343a40;
    text-align: center;
    text-decoration: line-through;
    font-size: 140%;
}
.product_rassurance {
    padding: 10px;
    margin-top: 15px;
    background: #ffffff;
    border: 1px solid #6c757d;
    color: #6c757d;
}
.product_rassurance .list-inline {
    margin-bottom: 0;
    text-transform: uppercase;
    text-align: center;
}
.product_rassurance .list-inline li:hover {
    color: #343a40;
}
.reviews_product .fa-star {
    color: gold;
}
.pagination {
    margin-top: 20px;
}
#total{
    border: #ffffff;
    text-align: right;
    margin-left: 10px;
    width: 95px;
    background-color: #ffffff;
}
#quantity{
    border: #ffffff;
    text-align: right;
    margin-left: 10px;
    width: 95px;
    background-color: #ffffff;
}
.price{
    border: lightsteelblue;
    text-align: left;
    margin-left: 10px;
    width: 95px;
    background-color: lightsteelblue;
}
.buyProduct{
    border-color:red ;
    border-style: solid;
    border-width: 1px;
}
</style>
@endsection
@section('content')
<div class="header text-left">
    <h1 class="pl-4">MY CART</h1 class="pl-4">
    <hr width="100%" style="background-color: red;" >
</div> 
<div class="container-fluid h-100">
<div class="row mb-5 " >
    <div class="col-12 col-md-12 col-xl-12 col-lg-12 ">
       
        <div class="col-8 col-md-8 col-xl-8 pl-2 pt-2 pb-2 p-3 float-left " style="flex-wrap: nowrap;height: 100%;">
            @foreach($cart as $cart) 
            <div class="row p-2 mb-2" style="background-color:lightsteelblue">
            <div class="col-xl-1 col-lg-1 col-1 float-left mt-auto mb-auto p-3">
                <input type="checkbox" name="" value="{{$cart->id}}" onclick="checkFunction()" checked="checked" class="btnCheck" >
            </div>
            <div class="col-xl-5 col-lg-5 col-5  float-left p-2">
                <div class="col-xl-4 col-lg-4 col-4 p-0 float-left">
                <img src="/upload/thumbnail/{{$cart->product->thumbnail}}" style="width:100%;height:70px"/> 
                </div>
                <div class="col-xl-8 col-lg-8 col-8 float-left">
                    <span>
                        <a href="{{route('productApp.show',$cart->product->id)}}">{{$cart->product->name}}</a>
                        <p>{{$cart->product->description}}</p>
                    </span>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-2 float-left p-2 text-center">
                <input id="number{{$cart->id}}" class="price"  value="{{number_format($cart->price,3) }}" style="width:100%" disabled>VNĐ
                <input id="price{{$cart->id}}"  value="{{number_format($cart->price,3) }}" hidden>
            </div>
            <div class="col-xl-2 col-lg-2 col-2 float-left p-2">
                <form method="POST" id="numberForm">
                    @csrf
                    @method('PUT')
                    <input type="number" name="number" class="number" product_id="{{$cart->product_id}}" id="{{$cart->id}}" value="{{$cart->number_product}}" style="text-align: center;width: 100%;height: auto;" min="1" width="100%">
                </form>
            </div>
            <div class="col-xl-2 col-lg-2 col-2 float-left p-2 mb-2 text-right">
                <form action="{{route('cart.destroy',$cart->id)}}" method="POST">
                    @method('DELETE') 
                    @csrf
                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-ban" aria-hidden="true"></i></button> 
                 </form>
            </div>
            </div>
            @endforeach
        </div>
        
        <div class="col-4 col-sm-4 col-xl-4 p-2 mt-3 float-right buyProduct"> 
            <h5>Buy Product</h5>
            <hr width="100%" style="background-color: red;"  >
            <form action="{{route('buy.create')}}" method="GET">
                <div class="row">
                    <div class="col-md-12 ">
                        Quantity:<input style="text-align: center;" id="quantity" value="{{$quantity}}"  disabled >
                    </div>
                    <div class="col-md-12">
                        Total:<input id="total" value="{{number_format($total,3)}}" disabled >VNĐ 
                        <input name="total" id="totalhidden" value="{{number_format($total,3)}}" hidden>
                        <button  class="btn btn-block btn-success mt-2" type="submit">BUY</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('form#numberForm').on('change',function(){

        var id = $(this).parent().find("input[name='number']").attr("id");
        var number=$(this).parent().find("input[name='number']").val();
        // var number = Number(num) + 1;
        var product_id=$(this).parent().find("input[name='number']").attr("product_id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
        url: "/cart/"+id,
        type: 'PUT',

        data: {id:id,product_id:product_id,number:number},
        success: function(data){
            if(data.success)
            {   
                // alert(data.success.price);
                $('#number'+data.success.id).val(data.success.price);
                $('#total').val(data.total);
                $('#totalhidden').val(data.total);
                $('#quantity').val(data.quantity);
                // $('#kkk');
            }
        },
    })
    })
})
</script>
<script type="text/javascript">
    function checkFunction(){

        var checkBox = document.getElementsByClassName('btnCheck');
        var total = document.getElementById('total');
        for (var i = 0; i < checkBox.length; i++)
        {
            checkBox[i].onchange = function(){
                if(this.checked != false)
                {
                    document.getElementById('total').value = '.000' ;
                }
                if(this.checked == true)
                {
                    var total = document.getElementById('total').value;
                    var total = total.replace(',','');
                    var total = parseInt(total);

                    var price = document.getElementById('price'+this.value).value;
                    var price = price.replace(',','');
                    var price = parseInt(price);
                    var result = total + price;
                    document.getElementById('total').value = result+'.000' ;
                    document.getElementById('totalhidden').value = result+'.000'; 
                    document.getElementById(this.value).disabled = false;
                }
                else
                { 
                    var total = document.getElementById('total').value;
                   
                    var total = total.replace(',','');
                    var total = parseInt(total);

                    var price = document.getElementById('price'+this.value).value;
                    var price = price.replace(',','');
                    var price = parseInt(price);
                    var result = total - price ;
                    document.getElementById(this.value).disabled = true;
                    document.getElementById('total').value = result+'.000' ; 
                    
                }
            }
            
        }
    }
</script>
@endsection