@section('title')
    Admin
@endsection
<div class="row">
    <div class="col-lg-12 mb-1" >
        <div class="col-lg-2 float-left sidenav" style="background-color: cadetblue;height: 700px; margin-bottom: 0px;">
            <div style="color: cornsilk;">
            <h2 style="background-color:crimson;">Dashboard</h2>
                <hr with="100%" >
                <a href="{{route('user.index')}}">User</a>
                <hr  width="100%" >
                <a href="{{route('category.index')}}">Category</a>
                <hr  width="100%" />
                <a href="{{route('product.index')}}">Product</a>
                <hr  width="100%" />
            </div>    
        </div>