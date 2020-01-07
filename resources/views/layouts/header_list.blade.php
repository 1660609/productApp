	<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-2">
					<p style="color: white;font-style: italic;"><span><img src="/upload/icon/logo-app.png" width="35px"></span>Product App</p>
				</div>
				<div class="col-lg-1">
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2 ml-4">
					<!-- header lists -->
					<ul>
						<li class="text-center border-right text-white">
							<a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
								<i class="fas fa-map-marker mr-2"></i>Select Location</a>
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-truck mr-2"></i>Track Order</a>
						</li>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 001 234 5678
						</li>
					@guest 
						<li class="text-center border-right text-white">
							<a href="{{ route('login') }}" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i>{{ __('Login') }}</a>
						</li>
						@if (Route::has('register'))
						<li class="text-center text-white">
							<a href="{{ route('register')}}" data-toggle="modal" data-target="#exampleModal2" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>{{ __('Register') }}</a>
						</li>
						@endif
						@else
						<li class="nav-item dropdown ">
							
								{{ Auth::user()->name }}
	
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
						</li>
					@endguest
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>
