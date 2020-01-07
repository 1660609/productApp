@extends('layouts.master')
@section('sidebar')
  @include('layouts.sidebar')
@endsection
@section ('css')
<style>
.center
{
    width: 920px;
    background-color:lightblue;
    margin-top: 10px;
    margin-left: 150px;
    padding: 0px;
    height: 700px;
}
.left
{
    width: 350px;
    height: 900px;
    margin: 0px;
    padding: 0px;
    background-color:honeydew;
    float: left;
    text-align: center;
}
</style>
@endsection
@section('content') 
<form action="{{route('profile.update',$profile->id)}}" method="POST" enctype="multipart/form-data">
@method('PUT')
@csrf
<div >
<div  class="left">
<h1>
    User Name
</h1>
<img src="/upload/avatar/{{$profile->avatar}}" height="250px" width="250px" >
<br><br>
<br>
<input type="file" name="avatar">
<input type="submit" class="btn btn-primary" value="Upload">
<br>    
<label style="font-size: 30px;">
    Date of birth
</label>
<br>
<label style="font-size: 30px;">
    Phone Number
</label>
</div>
<div class="center" style="margin-left: 370px;">
    <h2 style="margin-left: 5px;text-align: center;">Edit Profile</h2>
    <div style="margin-left: 50px;margin-right: 50px;">
    <div class="form-group">
        <label >First name</label>
        <input type="text" class="form-control"  placeholder="First name" name="first_name" value="{!!old('title',isset($profile) ? $profile->first_name : null)!!}">
    </div>
    <div class="form-group">
        <label >Last name</label>
        <input type="text" class="form-control"  placeholder="Last name" name="last_name" value="{!!old('title',isset($profile) ? $profile->last_name : null)!!}">
    </div>
    <div class="form-group">
        <label >Description</label>
        <input type="text" class="form-control"  placeholder="Description" name="description" value="{!!old('title',isset($profile) ? $profile->description : null)!!}">
    </div>
    <div class="form-group">
        <label >Phone</label>
        <input type="text" class="form-control"  placeholder="phone" name="phone" value="{!!old('title',isset($profile) ? $profile->phone : null)!!}">
    </div>
    <div class="form-group">
        <label >Date of birth</label>
        <input type="date" class="form-control"  placeholder="DOB" name="DOB" value="{!!old('title',isset($profile) ? $profile->DOB : null)!!}">
    </div>
    <div class="form-group">
        <label >Date of birth</label>
        <select class="form-control" name="gioitinh">
            <option value="{{$product->category_id ?? ''}}">{!!old('title',isset($profile) ? $profile->gioitinh : null)!!}</option>
            <option>Nam</option>
            <option>Nữ</option>
            <option>Khác</option>
         </select>
    </div>
    <input type="submit" class="btn btn-primary">
</div>
</div>
</div>
</form>
@endsection