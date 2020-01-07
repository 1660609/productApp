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
</style>
@endsection

@section('content')
<div class="row">
	<div class="container py-xl-4 py-lg-2" style="background-color: rgba(173, 216, 230, 0.678);">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>S</span>ingle
			<span>P</span>age</h3>
			<div class="col-lg-4" style="float:left">
				<div id="carousel-custom" class="carousel slide col-lg-12" data-ride="carousel" data-interval="false">
					<div class="carousel-outer" >
						<div class='carousel-inner'>
							<div class="carousel-item row no-gutters active">
								<img class="d-block w-100" src="/upload/thumbnail/{{$product->thumbnail}}" width="100%" height="320px" alt="First slide">
							</div>
							@foreach($product->galleries as $gallery)
							<div class="carousel-item carousel-item row no-gutters ">
								<img class="d-block w-100" src="/upload/gallery/{{$gallery->gallery_path}}" width="100%" height="320px" alt="Second slide">
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
								<div class="col-3 float-left"><img class="img-fluid" src='/upload/thumbnail/{{$product->thumbnail}}' class="card card-block " data-target='#carousel-custom' data-slide-to='0'  width="70px" style="height: 70px;"></div>
								@foreach($product->galleries as $key=>$value)
									@if($key <= 2)
									<div class="col-3 float-left"><img class="img-fluid" src='/upload/gallery/{{$value->gallery_path}}' class="card card-block"  width="70px" height="70px" alt='' data-target='#carousel-custom' data-slide-to='{{$i = $i + 1}}'></div>
									@endif
								@endforeach
							</div>
							<div class="carousel-item row no-gutters">
								@foreach($product->galleries as $key=>$value)
								@if($key > 2)
									<div class="col-3 float-left"><img class="img-fluid" src='/upload/gallery/{{$value->gallery_path}}' class="card card-block"  width="70px" height="70px"   alt='' data-target='#carousel-custom' data-slide-to='{{$i = $i + 1}}'></div>
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
			
			<div class="col-lg-8  single-right-left simpleCart_shelfItem">
				<h3 class="mb-3">{{$product->name}}</h3>
				<p class="mb-3">
					<span class="item_price">{{number_format($product->price,3) }} VND</span>
					<del class="mx-2 font-weight-light">280.00 VND</del>
					<label>Free delivery</label>
				</p>
				<div class="single-infoagile">
					<ul>
						<li class="mb-3">
							<strong> Category:</strong> <a href="{{route('categoryList.show',$product->category->id)}}">{{$product->category->name}}</a> 
						</li>
						<li class="mb-3">
							Description: {{$product->description}}
						</li>
					</ul>
				</div>
			
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="{{route('cart.store')}}" method="POST">
							<fieldset>
								@csrf
								<label>Quantity:</label><input class="form-control" type="number" value="1" id="example-number-input" style="width:100px;margin-bottom: 5px;">
								<input type="hidden" value="{{$product->price}}" name="price" >
								<input type="hidden" value="{{$product->id}}" name="id" >

								<button class="btn btn-round btn-danger" type="submit" >Add to Cart</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row" style="margin-top: 5px;">
	<div class="col-lg-10 mt-2 ml-auto mr-auto" style="background-color: rgba(240, 128, 128, 0.39);">
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>C</span>ontent
			<span>P</span>roduct</h3>
		<hr width="100%" height="1px" color="blue">
		<p style="font-size: 25px;">{{$product->content}}</p>
	</div>

</div>
<div class="row">
	<div class="container text-center col-lg-10" style="background-color: white;">
		<h1 style="text-align:center;color:green;">See More</h1> 
		<div id="recipeCarousel1" class="carousel slide w-100" data-ride="carousel" data-interval="false">
			<p hidden>{{$i = 0}}</p>
			<div class="carousel-inner w-80 ml-auto mr-auto" role="listbox">
				<div class="carousel-item row no-gutters active ml-4 mr-auto">
					@foreach($seeMore as $key=>$sm)
						@if($key <= 4)
						<div class="col-lg-2 float-left ml-3 mr-1 product-men mt-5 mr-2 mb-2 border" style="margin-left: 5px ; background-color: ivory;">
							<div class="men-thumb-item text-center" >
								<img src="/upload/thumbnail/{{$sm->thumbnail}}" width="100%" height="160px" alt="">
								<div class="men-cart-pro" style="margin-bottom: 0px;">
									<div class="inner-men-cart-pro ">
										<a href="{{route('productApp.show',$sm->id)}}" style="background-color: skyblue;" >Quick View</a>
									</div>
								</div>

							</div>
							<div>
								<a href="{{route('productApp.show',$sm->id)}}">{{$sm->name}}</a>
							</div>
							<div>
								{{number_format($sm->price,3)}} VNĐ
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out mb-3" >
								<form action="{{route('cart.store')}}" method="post">
									@csrf
									<fieldset>
										<input type="hidden" value="1" name="number">
										<input type="hidden" value="{{$sm->price}}" name="price" >
										<input type="hidden" value="{{$sm->category_id}}" name="category_id">
										<input type="hidden" value="{{$sm->id}}" name="id" >
										<input type="submit" name="submit" value="Add to cart" class="button btn" style="margin-bottom: 0px;" />
									</fieldset>
								</form>
							</div>
						</div>
						@endif
					@endforeach
				</div>
				<div class="carousel-item row no-gutters ml-4 mr-auto" >
					@foreach($seeMore as $key=>$sm)
					@if($key > 4)
					<div class="col-lg-2 float-left ml-3 mr-1 product-men mt-5 mr-2 mb-2 border" style="margin-left: 5px;background-color: ivory;">
						<div class="men-thumb-item text-center" >
							<img src="/upload/thumbnail/{{$sm->thumbnail}}" width="100%" height="160px" alt="">
							<div class="men-cart-pro" style="margin-bottom: 0px;">
								<div class="inner-men-cart-pro ">
									<a href="{{route('productApp.show',$sm->id)}}" style="background-color: skyblue;" >Quick View</a>
								</div>
							</div>

						</div>
						<div>
							<a href="{{route('productApp.show',$sm->id)}}">{{$sm->name}}</a>
						</div>
						<div>
							{{number_format($sm->price,3)}} VNĐ
						</div>
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out mb-3" >
							<form action="{{route('cart.store')}}" method="post">
								@csrf
								<fieldset>
									<input type="hidden" value="1" name="number">
									<input type="hidden" value="{{$sm->price}}" name="price" >
									<input type="hidden" value="{{$sm->category_id}}" name="category_id">
									<input type="hidden" value="{{$sm->id}}" name="id" >
									<input type="submit" name="submit" value="Add to cart" class="button btn" style="margin-bottom: 0px;" />
								</fieldset>
							</form>
						</div>
					</div>
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

	
        
@endsection