	<!-- top-header -->
	
		<div class="container-fluid pr-0 pl-0" style="background-color: turquoise;">
			<div class="row w-100 ">
				<div class="col-5 col-sm-4 mt-1 col-md-2 float-left">
					<a href="/"><p style="color: white;font-style: italic;margin-left: 2px;"><span><img src="/upload/icon/logo-app.png" width="35px"></span>Product App</p></a>
				</div>
				<div class="col-1 col-sm-1 col-md-6"></div>
				<div class="col-6 col-sm-6 col-lg-4 col-md-4 pl-0 pr-0 float-right">
					<!-- header lists -->
					@guest 
					<div class="row float-right">
						<div class="" style="text-align: left;">
							<a href="{{ route('login') }}" data-toggle="modal" data-target="#exampleModal" class=" btn btn-outline-info">
								<i class="fas fa-sign-in-alt mr-2">{{ __('Login') }}</i></a>
						@if (Route::has('register'))
							<a href="{{ route('register')}}" data-toggle="modal" data-target="#exampleModal2" class=" btn btn-outline-dark">
								<i class="fas fa-sign-out-alt mr-2">{{ __('Register') }}</i></a>
						</div>
					</div>
						@endif
						@else
						<div class="nav-item dropdown float-right">
							<div>
								<span><img src="/upload/avatar/default.jpg" style="border-radius:50%" width="40px" height="40px"></span>{{ Auth::user()->name }}
							</div>
	
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a  class="dropdown-item" href="{{route('profile.edit',Auth::user()->id)}}" >
								
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>
								<a class="dropdown-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</div>
					@endguest
					<!-- //header lists -->
				</div>
			</div>
		</div>
