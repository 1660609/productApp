
	<!-- Button trigger modal(select-location) -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="select-city">
			<h3>
				<i class="fas fa-map-marker"></i> Please Select Your Location</h3>
			
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //shop locator (popup) -->

	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Log In</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('login') }}" method="post">
						@csrf
						<div class="form-group">
							<label class="col-form-label">Username</label>
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Log in">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
							</div>
						</div>
						<p class="text-center dont-do mt-3">Don't have an account?
							<a href="#" data-toggle="modal" data-target="#exampleModal2">
								Register Now</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Register</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{route('register')}}" method="post">
						@csrf
						<div class="form-group">
							<label class="col-form-label">Your Name</label>
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group">
							<label class="col-form-label">Confirm Password</label>
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Register">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="" id="searchBar" style="background-color: black;">
			<div class="row  pl-0 pr-0 pt-2 pb-2">
				<!-- logo -->
				<div class="col-2 col-md-2 col-lg-2 header float-left">
					<div class="dropdown col-md-2">
						<button class="btn btn-outline-primary" style="width: 46px;" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
						@foreach($category as $cate)
						<a href="{{route('categoryList.show',$cate->id)}}"><button class="dropdown-item" type="button">{{$cate->name}}</button></a>
						@endforeach
						</div>
					</div>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-8 col-md-8 col-lg-8 header float-left ">
					<div class="col-12 col-md-10 ">
						<form class="form-inline" action="{{route('search.index')}}" method="GET">
							@csrf 
							<input class="form-control mr-sm-2"  style="width:85%" type="search" placeholder="Search" aria-label="Search" name="key" value="{{$key ?? ''}}" required>
							<span style="width:5%"><button class="btn btn-outline-primary " type="submit">Search</button></span>
						</form>
					</div>
				</div>
				<div class="col-2 col-md-2 col-lg-2 float-right ">
					<div class="">
						<a href="{{route('cart.index')}}" style="height: 50px;margin-top: 8px;" class="notification">
							<img src="/upload/icon/cart.png" width="40px" height="40px">
							<span class="badge" style="background-color: red;color: white;">{{$countCart ?? ''}}</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	@yield('poster')

	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/">Home</a>
						<i>|</i>
					</li>
					<li>Help</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- <div class="vertical-menu" style="float: left;margin-top: 11.5%;top: 1%;">
		<h2>Category</h2>
		@foreach($category as $cate)
			<a href="{{route('categoryList.show',$cate->id)}}">{{$cate->name}}</a>
		@endforeach
	  </div> -->
	  
	<!-- //page -->
<script>
	window.onscroll = function() {myFunction()};
	var header = document.getElementById("searchBar");
	var sticky = header.offsetTop;
	
	function myFunction() {
		if (window.pageYOffset > sticky) {
		header.classList.add("sticky");
		} else {
		header.classList.remove("sticky");
		}
	}
</script>
