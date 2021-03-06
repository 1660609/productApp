<title>Product App</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<style>
		.vertical-menu {
		width: 19.5%;
		position: absolute;
		}
		.vertical-menu h2{
			background-color: blue;
			color: white;
			display: block;
			padding: 12px;
			text-decoration: none;
		}
		.vertical-menu a {
		background-color: #eee;
		color: black;
		display: block;
		padding: 12px;
		text-decoration: none;
		}

		.vertical-menu a:hover {
		background-color: rgb(82, 170, 185);
		color: white;
		}

		.vertical-menu a.active {
		background-color: #4CAF50;
		color: white;
		}
		.sticky {
		position: fixed;
		top: 0;
		width: 100%;
		z-index: 9999999999999;
		background-color: white;
		}
		.sidenav{
			-moz-box-shadow: 3px 3px 5px 0px #666;
			-webkit-box-shadow: 3px 3px 5px 0px #666;
			box-shadow: 3px 3px 5px 0px #666;
		}
		.preloading {
    overflow: hidden;
}
.preload-container {
    width: 100%;
    height: 100%;
    background: lavender;
    position: fixed;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    z-index: 999999999999999999;
    display: block;
    padding-right: 17px;
    overflow-x: hidden;
    overflow-y: auto;
}
.preload-icon {
    font-size: 66px;
    color: rgb(173, 17, 17);
    margin-top: 20%;
}
@-webkit-keyframes {
  from {
    -webkit-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes rotating {
  from {
    -ms-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  to {
    -ms-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.rotating {
  -webkit-animation: rotating 1.5s linear infinite;
  -moz-animation: rotating 1.5s linear infinite;
  -ms-animation: rotating 1.5s linear infinite;
  -o-animation: rotating 1.5s linear infinite;
  animation: rotating 1.5s linear infinite;
}
</style>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="{{asset('/css/fontawesome-all.css')}}">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="{{asset('/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="{{asset('/css/menu.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
		rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="/js/myscript.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>  
	<script type="text/javascript" src="/editor/ckeditor/ckeditor.js"></script>
	<script src="https://unpkg.com/imask"></script>
	<!-- //web fonts -->