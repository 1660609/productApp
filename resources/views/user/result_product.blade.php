@extends('layouts.master')
@section('sidebar')
    @include('layouts.sidebar_user')
@endsection
@section('css')
<style>
  .pro-detail{
    -moz-box-shadow: 3px 3px 5px 0px #666;
    -webkit-box-shadow: 3px 3px 5px 0px #666;
    box-shadow: 3px 3px 5px 0px #666;
  }

  .container-fluid{
	  background-color: rgba(95, 158, 160, 0.678);
	  height: 99%;
  }
  @media(max-width:33.9em) {
  .navbar .collapse {max-height:250px;width:100%;overflow-y:auto;overflow-x:hidden;}
  .navbar .navbar-brand {float:none;display: inline-block;}
  .navbar .navbar-nav>.nav-item { float: none; margin-left: .1rem;}
  .navbar .navbar-nav {float:none !important;}
  .nav-item{width:100%;text-align:left;}
  .navbar .collapse .dropdown-menu {
    position: relative;
    float: none;
    background:none;
    border:none;
  }
}
</style>
@endsection
@section('content')
	<div class="ads-grid py-sm-5 py-4">
		<div class=" py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="col-lg-2 col-12 col-md-3 col-xl-2 bd-sidebar pl-2 ">
				<div class="container-fluid" >
						<nav class="navbar navbar-light pl-0 pr-0">
						  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header">
							&#9776;
						  </button>
						  <a class="navbar-brand" href="#">Filter</a>
						  <hr width="100%" style="background-color: white" class="">
						  <form action="{{route('search.index')}}" method="get">
						  <div class=" navbar-toggleable-xs pl-0 pr-0 w-100" id="navbar-header">
							<ul class="nav navbar-nav pl-0 pr-0">
							  <li class="nav-item active w-100 ">
								<div class="ml-auto mr-auto mt-2 ml-0 mr-0 pl-0 pr-0 w-100" >
									<h6>Category</h6>
									<select class="custom-select custom-select-sm w-100 mt-2" name="srcCate">
										<option value="{{$srcCate ?? ''}}">{{$srcCate ?? ''}}</option>
										@foreach($category as $cate)
										<option value="{{$cate->id}}">{{$cate->name}}</option>
										@endforeach
									</select>
								</div>
							  </li>
							  <li class="nav-item">
								<div class="ml-auto mr-auto mt-2 ml-0 mr-0 pl-0 pr-0 w-100" >
									<h6>Address</h6>
									<select class="custom-select custom-select-sm w-100 mt-2" name="srcAddress">
									<option value="{{$srcAddress ?? ''}}">{{$srcAddress ?? ''}}</option>
										<option value="An Giang">An Giang
											<option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu
											<option value="Bắc Giang">Bắc Giang
											<option value="Bắc Kạn">Bắc Kạn
											<option value="Bạc Liêu">Bạc Liêu
											<option value="Bắc Ninh">Bắc Ninh
											<option value="Bến Tre">Bến Tre
											<option value="Bình Định">Bình Định
											<option value="Bình Dương">Bình Dương
											<option value="Bình Phước">Bình Phước
											<option value="Bình Thuận">Bình Thuận
											<option value="Bình Thuận">Bình Thuận
											<option value="Cà Mau">Cà Mau
											<option value="Cao Bằng">Cao Bằng
											<option value="Đắk Lắk">Đắk Lắk
											<option value="Đắk Nông">Đắk Nông
											<option value="Điện Biên">Điện Biên
											<option value="Đồng Nai">Đồng Nai
											<option value="Đồng Tháp">Đồng Tháp
											<option value="Đồng Tháp">Đồng Tháp
											<option value="Gia Lai">Gia Lai
											<option value="Hà Giang">Hà Giang
											<option value="Hà Nam">Hà Nam
											<option value="Hà Tĩnh">Hà Tĩnh
											<option value="Hải Dương">Hải Dương
											<option value="Hậu Giang">Hậu Giang
											<option value="Hòa Bình">Hòa Bình
											<option value="Hưng Yên">Hưng Yên
											<option value="Khánh Hòa">Khánh Hòa
											<option value="Kiên Giang">Kiên Giang
											<option value="Kon Tum">Kon Tum
											<option value="Lai Châu">Lai Châu
											<option value="Lâm Đồng">Lâm Đồng
											<option value="Lạng Sơn">Lạng Sơn
											<option value="Lào Cai">Lào Cai
											<option value="Long An">Long An
											<option value="Nam Định">Nam Định
											<option value="Nghệ An">Nghệ An
											<option value="Ninh Bình">Ninh Bình
											<option value="Ninh Thuận">Ninh Thuận
											<option value="Phú Thọ">Phú Thọ
											<option value="Quảng Bình">Quảng Bình
											<option value="Quảng Bình">Quảng Bình
											<option value="Quảng Ngãi">Quảng Ngãi
											<option value="Quảng Ninh">Quảng Ninh
											<option value="Quảng Trị">Quảng Trị
											<option value="Sóc Trăng">Sóc Trăng
											<option value="Sơn La">Sơn La
											<option value="Tây Ninh">Tây Ninh
											<option value="Thái Bình">Thái Bình
											<option value="Thái Nguyên">Thái Nguyên
											<option value="Thanh Hóa">Thanh Hóa
											<option value="Thừa Thiên Huế">Thừa Thiên Huế
											<option value="Tiền Giang">Tiền Giang
											<option value="Trà Vinh">Trà Vinh
											<option value="Tuyên Quang">Tuyên Quang
											<option value="Vĩnh Long">Vĩnh Long
											<option value="Vĩnh Phúc">Vĩnh Phúc
											<option value="Yên Bái">Yên Bái
											<option value="Phú Yên">Phú Yên
											<option value="Tp.Cần Thơ">Tp.Cần Thơ
											<option value="Tp.Đà Nẵng">Tp.Đà Nẵng
											<option value="Tp.Hải Phòng">Tp.Hải Phòng
											<option value="Tp.Hà Nội">Tp.Hà Nội
											<option value="TP  HCM">TP HCM    
									</select>
								</div>
							  </li>
							  <li class="nav-item">
								<div class="ml-auto mr-auto mt-2 ml-0 mr-0 pl-0 pr-0 w-100" >
									<h6>Price range</h6>
									<div class="row m-auto">
										<input class="form-control col-5" type="number" name="srcPriceMin" value="{{$srcPriceMin ?? ''}}">
										<span>-to-</span>
										<input class="form-control col-5" type="number" name="srcPriceMax" value="{{$srcPriceMax ?? ''}}">
									</div>
									
								</div>
							  </li>
							  
							  <hr width="100%" style="background-color:white;">
							  <button type="submit" class="btn btn-outline-primary mt-3">Submit</button>
							</ul>
							<div class="mt-3 container-fluid" style="background-color: violet;">
								
							</div>
						  </div>
						</form>
						</nav> <!-- /navbar -->
						
					</div><!-- /container -->
				</div>
				<div class="agileinfo-ads-display col-lg-9 col-12 col-md-9 col-xl-10 pl-1 pr-1 ml-auto mr-auto">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-left font-italic ">Search Result: {{$key}}</h3>
							<hr width="100%" style="background-color: red">
							<div class="row mt-2 ">
							@foreach ($product as $pro)
							<a href="{{route('productApp.show',$pro->id)}}">
								<div class="col-md-3 col-6 col-lg-3 col-xl-3 mt-2 ">
									<div class="men-pro-item simpleCart_shelfItem ml-xl-3 p-2 mr-xl-3 pro-detail">
										<div class="men-thumb-item text-center">
										<div class=" mr-auto ml-auto " >
											<img src="/upload/thumbnail/{{$pro->thumbnail}}" width="100%" style="height:200px" alt="">
										</div>	
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a>{{$pro->name}}</a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">{{number_format($pro->price,3)}} VNĐ</span>
												<del>$300.00</del>
											</div>
										</div>
									</div>
								</div>
							</a>
							@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
@endsection