@section('title')
    Admin
@endsection
<div class="row">
    <div class="col-lg-12 mb-1" >
        <div class="col-lg-2 mt-1 float-left sidenav" class="" style="background-color:darkblue;height: 99.5%; margin-bottom: 0px;width: 70%;">
            <div class="col-12 mt-3 mb-1" style="width: 100%;border: white;background-color:none;text-align: center;">
                <img src="/upload/avatar/default.jpg" class="rounded-circle" style="margin-top:5%;border: white;border-style: solid;" width="100px" height="100px">
                <h6 style="color: aqua;margin-top: 3%">{{Auth::user()->name}}</h6>
                
                
            </div>
            <hr with="100%" style="color: aqua;border-color: aqua;" >
            <h4 style="width: 100%;color: white;margin-bottom: 20px">
                <span><i class="fa fa-home" aria-hidden="true"></i></span> Dashboard</h4>
                <ul class="nav navbar-nav" >
                    <li>
                        <a href="{{route('user.index')}}"><p style="color:white"><span><i class="fa fa-users" aria-hidden="true"></i></span> User</p></a>
                    </li>
                    <li>
                        <a href="{{route('category.index')}}"><p style="color: white;"><i class="fa fa-bars" aria-hidden="true"></i> Category</p></a>
                    </li>
                    <li>
                        <a href="{{route('product.index')}}"><p style="color: white;"><i class="fa fa-shopping-cart" aria-hidden="true"> </i>Product</p></a>
                    </li>
                </ul>
            <hr with="100%" style="color: aqua;border-color: aqua; margin-top: 50%;" >
        </div>
