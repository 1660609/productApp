<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.header')
@yield('css')
</head>
<body>
@include('layouts.header_list')
@yield('sidebar')
@include('layouts.flash')
@yield('content')
</body>
    @include('layouts.footer')
</html>                                		                            
