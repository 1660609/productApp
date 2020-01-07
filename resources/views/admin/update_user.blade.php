@extends('layouts.master')
@section('sidebar')
  @include('layouts.sidebar')
@endsection
@section('content')
<h3>Edit User <h3>
<hr width="100%">
<form action="{{route('user.update',$data->id)}}" method="POST" style="margin-left: 40px;margin-right: 250px;font-size: 20px;" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Name User</label>
      <input type="text" class="form-control"  placeholder="Name User" name="name" value="{!!old('title',isset($data) ? $data->name : null)!!}">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Email User</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="email" rows="3">{!!old('title',isset($data) ? $data->email : null)!!}</textarea>
    </div>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Update User</button>
  </form>
@endsection