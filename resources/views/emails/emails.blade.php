<!DOCTYPE html>
<html lang="en">
<head>
<title>Product App</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="{{asset('/css/fontawesome-all.css')}}">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="{{asset('/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
    <link href="{{asset('/css/menu.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
		rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="/js/myscript.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>  
	<script type="text/javascript" src="/editor/ckeditor/ckeditor.js"></script>
	<script src="https://unpkg.com/imask"></script>
</head>
<body>
    <div class="contianer ">
        <div class="row">
            <h1>Thông tin sản phẩm của bạn </h1>
            <div class="col-10 col-md-10 col-lg-10 text-center mt-5">
                @foreach($buy as $b)
                <div class="mb-3">
                    <img src="<?php echo $message->embed(public_path().'/upload/thumbnail/'.$b->product->thumbnail) ?>" alt="">
                    <p>
                        <strong>Tên sản phẩm</strong><span>{{$b->product->name}}</span>
                    </p>
                    @if($b->variant_id > 0)
                    <p>
                        <strong>Kích cỡ </strong><span>{{$b->variants->size}}</span>
                        <strong>Màu sắc: </strong><span style="border-radius: 50%;background-color: {{$b->variants->color}};height: 20px;width: 20px;"></span>
                    </p>
                    @endif
                    <p><strong>Địa chỉ giao hàng: </strong>{{$b->address}}</p>
                    <p><strong>Người nhận:</strong>{{$b->name}}</p>
                    <p><strong>Số điện thoại người nhận: </strong>{{$b->phone}}</p>
                    <p><strong>Tổng tiền: </strong>{{$b->total_money}}</p>
                </div>
                <hr width="100%" style="background_color: black">
                @endforeach
            </div>
        </div>

    </div>
    Thank you {{$user->name}} !!!
</body>
</html>