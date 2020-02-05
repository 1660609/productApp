@extends('layouts.master')
@section('sidebar')
    @include('layouts.sidebar_user')
@endsection

@section('css')


@endsection

@section('content')
<div class="contianer-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-10 col-xl-10 ml-auto mr-auto ">
            <div class="col-md-8 col-lg-8 col-xl-8 mt-5 mb-5  float-left">
                @foreach($buy as $b)
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="/upload/thumbnail/{{$b->product->thumbnail}}" class="card-img" alt="..." height="200px">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{$b->product->name}} <span class="float-right"><button class="btn btn-outline-info btn-sm">x{{$b->quantity}}</button></span></h5>
                          <p class="card-text">{{$b->product->description}}</p>
                          <p class="card-text"><small class="text-muted">{{number_format($b->total_money,3)}} VNĐ</small></p>
                        </div>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4 col-lg-4 col-xl-4 mt-5 mb-5 float-right">
                <h5>Thanh Toán</h5>
                <div class="mb-5">
                    <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#myModal"> Chọn địa chỉ khác</button>
                </div>
                <div class="input-group mb-3 mt-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Name</span>
                    </div>
                    <input type="text" id="name" name="nameAd" class="form-control" placeholder="Username" >
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Phone</span>
                    </div>
                    <input type="text" id="phone"  name="phoneAd" class="form-control" placeholder="Number phone" >
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                  </div>
                  <input type="text" id="address" name="emailAd" class="form-control"  placeholder="Email"  value="{{Auth::user()->email}}" >
              </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Address</span>
                    </div>
                    <input type="text" id="address" name="addressAd" class="form-control" placeholder="Address" >
                </div>
                <hr width="100%" style="background-color:black ;">
                <div class="float-right mb-3">
                    Total: {{number_format($total,3)}} VNĐ
                </div>
                <div class="mt-5">
                  <form action="{{route('send.mail')}}" method="GET">
                    <button class="btn btn-outline-danger btn-lg btn-block">Thanh Toán</button>
                  </form>
                </div>
            </div>
            <!--  modal list address -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">List address</h4>
                  </div>
                  <div class="modal-body">

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($address as $ad)
                        <tr>
                          <td scope="row"><input type="radio" name="select" value="{{$ad->id}}" id="radioCheck"></td>
                          <td>{{$ad->name}}</td>
                          <td>{{$ad->phone}}</td>
                          <td>{{$ad->address}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <form action="{{route('address.create',Auth::user()->id)}}" method="get">
                      <button type="submit" class="btn btn-outline-success" >Address</button>
                    </form>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
            
              </div>
            </div>
        </div>

    <script text="text/javascript">
    $(document).ready(function(){
      $('input#radioCheck').on('change',function(){
        var id = $(this).parent().find("input[name='select']").val();
        if(this.checked == true)
        {
          $("input[name='nameAd']").val($(this).closest('tr').find('td:nth-child(2)').text());
          $("input[name='phoneAd']").val($(this).closest('tr').find('td:nth-child(3)').text());
          $("input[name='addressAd']").val($(this).closest('tr').find('td:nth-child(4)').text());
        }
      })
    })
    </script>



    </div>
</div>
@endsection