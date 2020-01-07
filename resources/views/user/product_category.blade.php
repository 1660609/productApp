@extends('layouts.master')
@section('sidebar')
    @include('layouts.sidebar_user')
@endsection
@section('poster')
<img src="/upload/banner/{{$category->banner}}" width="100%" style="">
@endsection
@section('content')
<div class="ads-grid py-sm-5 py-4">
		<div class=" py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="col-lg-2">
					<div class="row">
						<div class="col-lg-12 mt-lg-0 mt-4 p-lg-0 mb-3">
							<div class="side-bar p-sm-4 p-3">
								<div class="search-hotel border-bottom py-2">
								<div class="range border-bottom py-2">
									<h3 class="agileits-sear-head mb-3">Menu</h3>
									<div class="w3l-range">
										<ul>
											@foreach($categories as $cate)
											<li>
												<a href="{{route('categoryList.show',$cate->id)}}">{{$cate->name}}</a>
											</li>
											@endforeach
										</ul>
									</div>
								</div>
								</div> 
							</div>
						</div>
						<br><br>
						<div class="col-lg-12 mt-lg-0 mt-4 p-lg-0">
							<div class="side-bar p-sm-4 p-3">
								<div class="search-hotel border-bottom py-2">
									<h3 class="agileits-sear-head mb-3">Search Here..</h3>
									<form action="#" method="post">
										<input type="search" placeholder="Product name..." name="search" required="">
										<input type="submit" value=" ">
									</form>
								</div>
								<!-- price -->
								<div class="range border-bottom py-2">
									<h3 class="agileits-sear-head mb-3">Price</h3>
									<div class="w3l-range">
										<ul>
											<li>
												<a href="#">Under $1,000</a>
											</li>
											<li class="my-1">
												<a href="#">$1,000 - $5,000</a>
											</li>
											<li>
												<a href="#">$5,000 - $10,000</a>
											</li>
											<li class="my-1">
												<a href="#">$10,000 - $20,000</a>
											</li>
											<li>
												<a href="#">$20,000 $30,000</a>
											</li>
											<li class="mt-1">
												<a href="#">Over $30,000</a>
											</li>
										</ul>
									</div>
								</div>
								<!-- //price -->
								<!-- discounts -->
								<div class="left-side border-bottom py-2">
									<h3 class="agileits-sear-head mb-3">Discount</h3>
									<ul>
										<li>
											<input type="checkbox" class="checked">
											<span class="span">5% or More</span>
										</li>
										<li>
											<input type="checkbox" class="checked">
											<span class="span">10% or More</span>
										</li>
										<li>
											<input type="checkbox" class="checked">
											<span class="span">20% or More</span>
										</li>
										<li>
											<input type="checkbox" class="checked">
											<span class="span">30% or More</span>
										</li>
										<li>
											<input type="checkbox" class="checked">
											<span class="span">50% or More</span>
										</li>
										<li>
											<input type="checkbox" class="checked">
											<span class="span">60% or More</span>
										</li>
									</ul>
								</div>
								<div class="left-side border-bottom py-2">
									<h3 class="agileits-sear-head mb-3">Cash On Delivery</h3>
									<ul>
										<li>
											<input type="checkbox" class="checked">
											<span class="span">Eligible for Cash On Delivery</span>
										</li>
									</ul>
								</div>
							</div>
							<!-- //product right -->
						</div>
					</div>
				</div>
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic">{{$category->name}}</h3>
							<div class="row">
              @foreach($category->product as $pro)
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="/upload/thumbnail/{{$pro->thumbnail}}" width="200px" height="250px" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="{{route('productApp.show',$pro->id)}}" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="single.html">{{$pro->name}}</a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">{{number_format($pro->price,3)}} VNĐ</span>
												<del>$300.00</del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="{{route('cart.store')}}" method="post">
													@csrf
													<fieldset>
														<input type="hidden" value="1" name="number">
														<input type="hidden" value="{{$pro->price}}" name="price" >
        												<input type="hidden" value="{{$pro->id}}" name="id" >
														<input type="submit" name="submit" value="Add to cart" class="button btn" />
													</fieldset>
												</form>
											</div>
										</div>
									</div>
									</div>
								@endforeach
							</div>
						</div>
				</div>	
			</div>
		</div>
	</div>
</div>



@endsection