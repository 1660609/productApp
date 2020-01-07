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
</style>
@endsection
@section('content')
<div class="header" style="margin-left: 200px;">
    <h1>MY CART</h1>
    <div class="form-group">
        
    </div>
</div>
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th scope="col"> </th>
                            <th scope="col">Name Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($cart as $cart)
                            <tr id="$cart->id">
                             <td> 
                                 <input type="checkbox" name="vehicle" value="" checked="checked" >
                            </td>
                             <td><img src="/upload/thumbnail/{{$cart->product->thumbnail}}" width="70px" height="70px"/> </td>
                             <td><a href="{{route('productApp.show',$cart->product->id)}}">{{$cart->product->name}}</a>
                                <p>{{$cart->product->description}}</p>
                    
                             </td>
                             <td>In stock</td>
                             <td>
                                <form method="POST" id="numberForm">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="number" class="number" product_id="{{$cart->product_id}}" id="{{$cart->id}}" value="{{$cart->number_product}}" style="text-align: center;" min="1" width="100px">
                                </form>
                            </td>
                             <td class="text-right" name="number" id="number30">
                                 <p id="number{{$cart->id}}">{{number_format($cart->price,3) }} VNĐ</p>
                            </td>
                             <td class="text-right">
                                 <form action="{{route('cart.destroy',$cart->id)}}" method="POST">
                                    @method('DELETE') 
                                    @csrf
                                    <button class="btn btn-sm btn-danger" type="submit">delete</button> 
                                 </form>
                             </td>
                           </tr>
                           @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong> <p id="total">Total: {{$total}} VNĐ</p></strong></td>
                            <td class="text-right"><strong></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="/" class="btn btn-block btn-light">Continue Shopping</a>
                </div>
                <form action="{{route('buy.create')}}" method="GET">
                        <button class="btn btn-block btn-success" type="submit">BUY</button>
                </form>
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
                $('#number'+data.success.id).html(data.success.price+"VNĐ");
                $('#total').html('Total:'+' '+data.total+' VNĐ');
                // $('#kkk');
            }
        },
    })
    })
})
</script>
@endsection