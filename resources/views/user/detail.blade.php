@extends('layouts.master')
@section('sidebar')
	@include('layouts.sidebar_user')
	@section('poster')
    	@include('layouts.poster')
	@endsection
@endsection
@section('css')
<style>
div.scrollmenu {
  background-color: white;
  overflow: auto;
  flex-wrap: nowrap;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: darkslateblue;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}
.dot {
  height: 25px;
  width: 25px;
  border-radius: 50%;
  display: inline-block;
}
</style>
@endsection

@section('content')





<!-- @foreach ($img as $value)
<p>{{$value}}</p>
@endforeach -->



<div class="row ml-2 mr-2 mt-2">
	<div class="container-fluid p-4 pb-3 ml-auto mr-auto " style="background-color: rgba(173, 216, 230, 0.678);">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>S</span>ingle
			<span>P</span>age</h3>
			<div class="col-lg-4 col-12 col-sm-4 col-xl-4" style="float:left">
				<div id="carousel-custom" class="carousel slide col-lg-12" data-ride="carousel" data-interval="false">
					<div class="carousel-outer" >
						<div class='carousel-inner'>
							<div class="carousel-item row no-gutters active">
								<img class="d-block w-100" src="/upload/thumbnail/{{$product->thumbnail}}" width="100%" height="320px" alt="First slide">
							</div>
							@foreach($img as $gallery)
							<div class="carousel-item carousel-item row no-gutters ">
								<img class="d-block w-100" src="/upload/gallery/{{$gallery}}" width="100%" height="320px" alt="Second slide">
							</div>
							@endforeach
						</div>	
					</div>
				</div>
				<div class="container text-center my-3">
					<div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel" data-interval="false">
						<p hidden>{{$i = 0}}</p>
						<div class="carousel-inner w-100" role="listbox">
							<div class="carousel-item row no-gutters active">
								<div class="col-3 float-left">
									<img class="img-fluid" src='/upload/thumbnail/{{$product->thumbnail}}' class="card card-block  " data-target='#carousel-custom' data-slide-to='0'  width="70px" style="height: 70px;"></div>
								@foreach($img as $key=>$value)
									@if($key <= 2)
									<div class="col-3 float-left"><img class="img-fluid" src='/upload/gallery/{{$value}}' class="card card-block"  width="70px" style="height: 70px;" alt='' data-target='#carousel-custom' data-slide-to='{{$key+1}}'></div>
									@endif
								@endforeach
							</div>
							<div class="carousel-item no-gutters row float-left " style="flex-wrap: nowrap;">
								@foreach($img as $key=>$value)
								@if($key > 2 && $key <= 6 )
									<div class="col-3 float-left"><img class="img-fluid" src='/upload/gallery/{{$value}}' class="card card-block"  width="70px" height="70px"   alt='' data-target='#carousel-custom' data-slide-to='{{$key+1}}'></div>
								@endif
								@endforeach
							</div>
							<div class="carousel-item no-gutters row float-left" style="flex-wrap: nowrap;">
								@foreach($img as $key=>$value)
								@if($key > 6 && $key <=10)
									<div class="col-3 float-left"><img class="img-fluid" src='/upload/gallery/{{$value}}' class="card card-block"  width="70px" height="70px"   alt='' data-target='#carousel-custom' data-slide-to='{{$key+1}}'></div>
								@endif
								@endforeach
							</div>
							<div class="carousel-item no-gutters row float-left" style="flex-wrap: nowrap;">
								@foreach($img as $key=>$value)
								@if($key > 10)
									<div class="col-3 float-left"><img class="img-fluid" src='/upload/gallery/{{$value}}' class="card card-block"  width="70px" height="70px"   alt='' data-target='#carousel-custom' data-slide-to='{{$key+1}}'></div>
								@endif
								@endforeach
							</div>
						</div>
						<a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			
			<div class="col-lg-8 col-12 col-md-8 col-xl-8">
				<h3 class="mb-3" name="namePd">{{$product->name}}</h3>
				<p class="mb-3">
					<span class="item_price" name="pricePd">{{number_format($product->price,3) }} VND</span>
					<del class="mx-2 font-weight-light">280.00 VND</del>
				</p>
				<div class="single-infoagile">
					<ul>
						<li class="mb-3">
							<strong> Category:</strong><a href="{{route('categoryList.show',$product->category->id)}}">{{$product->category->name}}</a> 
						</li>
						<li class="mb-3">
							Description: {{$product->description}}
						</li>
						<li class="mb-3">
							<strong>Color: </strong>
							@foreach ($product->variant as $key=>$variant)
								<a data-slide-to="{{$key+1}}"  data-target='#carousel-custom' id="variant" value="{{$variant->id}}">
							 	<span class="dot" style="background-color: {{$variant->color}};" ></span></a>
							@endforeach
						</li>
						<li><strong>Size:</strong>
							@foreach ($product->variant as $variant)
							 <span>{{$variant->size}}, </span>
							@endforeach
						</li>
					</ul>
				</div>
			
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="{{route('cart.store')}}" method="POST">
							<fieldset>
								@csrf
								<label>Quantity:</label><input class="form-control" name="number" type="number" value="1" id="example-number-input" style="width:100px;margin-bottom: 5px;">
								<input type="hidden" value="{{$product->price}}" name="price" >
								<input type="hidden" value="{{$product->id}}" name="id" >
								<input type="hidden" value="0" name="variant">
								<input type="hidden" value="0" name="variant_id">
								<button class="btn btn-round btn-danger" type="submit" >Add to Cart</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row  ml-2 mr-2" style="margin-top: 5px;">
	<div class="col-lg-12 col-12 mt-2 ml-auto mr-auto pb-5" style="background-color: rgba(240, 128, 128, 0.39);">
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>C</span>ontent
			<span>P</span>roduct</h3>
		<hr width="100%" height="1px" color="blue">
		<p style="font-size: 25px;">{!!$product->content!!}</p>
	</div>

</div>
<div class="row">
	<div class="container text-center col-lg-10" style="background-color: white;">
		<h1 style="text-align:center;color:green;">See More</h1> 
		<div id="recipeCarousel1" class="carousel slide w-80" data-ride="carousel" data-interval="false">
			<p hidden>{{$i = 0}}</p>
			<div class="carousel-inner w-80 ml-auto mr-auto" role="listbox">
				<div class="carousel-item row no-gutters active ml-4 pt-5 mr-auto ml-auto">
					@foreach($seeMore as $key=>$sm)
						@if($key <= 3)
						<a href="{{route('productApp.show',$sm->id)}}">
							<div class="col-lg-3 col-3 col-md-3 col-sm-3 float-left p-2 mb-2 border" style="background-color: ivory;">
								<div class="men-thumb-item text-center p-2" >
									<img src="/upload/thumbnail/{{$sm->thumbnail}}" width="100%" height="160px" alt="">
								</div>
								<div>
									<a href="{{route('productApp.show',$sm->id)}}">{{$sm->name}}</a>
								</div>
								<div>
									{{number_format($sm->price,3)}} VNĐ
								</div>
							</div>
						</a>
						@endif
					@endforeach
				</div>
				<div class="carousel-item row no-gutters ml-4 pt-5  mr-auto pl-auto pr-auto" >
					@foreach($seeMore as $key=>$sm)
					@if($key > 3)
					<a href="{{route('productApp.show',$sm->id)}}">
						<div class="col-lg-3 col-3 col-md-3 col-sm-3 h-50 float-left p-2 mb-2 border" style="background-color: ivory;">
							<div class="men-thumb-item text-center p-2" >
								<img src="/upload/thumbnail/{{$sm->thumbnail}}" width="100%" style="min-height: 160px;" alt="">
							</div>
							<div>
								<a href="{{route('productApp.show',$sm->id)}}">{{$sm->name}}</a>
							</div>
							<div>
								{{number_format($sm->price,3)}} VNĐ
							</div>
						</div>
					</a>
					@endif
					@endforeach
				</div>
			</div>
		
			<a class="carousel-control-next" href="#recipeCarousel1" role="button" data-slide="next" style="margin-right: 10px">
				<span class="carousel-control-next-icon" aria-hidden="true" style="font-style: italic;background-color: cornflowerblue;"></span>
				<span class="sr-only">Next</span>
			</a>
			<a class="carousel-control-prev" href="#recipeCarousel1" role="button" data-slide="prev" >
				<span class="carousel-control-prev-icon" aria-hidden="true" style="font-style: italic;background-color: cornflowerblue;"></span>
				<span class="sr-only">Previous</span>
			</a>
		</div>
	</div>
</div>

<script text="text/javascript">
	$(document).ready(function(){
		$('a#variant').on('click',function(){
			var id = $(this).attr('value');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
                url: "/variantCard/"+id,
                type: "GET",
                data: {id:id},
                success: function(data){
                    if(data.success)
                    {
						$("span[name='pricePd']").html( data.variant.price+ ".000 VNĐ");
						$("input[name='price']").val(data.variant.price);
						$("input[name='variant']").val('1');
						$("input[name='variant_id']").val(data.variant.id);
                    }
                }
            })
			// 
		})
	})

</script>
	
        
@endsection