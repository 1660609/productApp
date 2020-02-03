<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.header')
@yield('css')
</head>
<body class="preloading">
<div id="preload" class="preload-container text-center">
    <div class="spinner-border spinner-border-sm" role="status">
    <span class="sr-only">Loading...</span>
    </div>
</div>

@include('layouts.header_list')
@yield('sidebar')
@include('layouts.flash')
@yield('content')

@include('layouts.footer')
<script>
$(window).load(function() {
    $('body').removeClass('preloading');
    $('#preload').delay(1000).fadeOut('fast');
});
</script>
</html>                                		                            
