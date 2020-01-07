@extends('layouts.master')
@section('sidebar')
  @include('layouts.sidebar')
@endsection
@section('content')
<h3>Edit Category <h3>
<hr width="100%">
<form action="{{route('category.update',$data->id)}}" method="POST" style="margin-left: 40px;margin-right: 250px;font-size: 20px;" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Name Category</label>
      <input type="text" class="form-control"  placeholder="Name Category" name="name" value="{!!old('title',isset($data) ? $data->name : null)!!}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description Category</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{!!old('title',isset($data) ? $data->description : null)!!}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Image Banner</label>
        <br>
        <img src="/upload/banner/{{$data->banner}}" class="img-thumbnail" >
        <input type="file" name="banner" class="form-control-file" id="exampleFormControlFile1">
    </div>

    <button type="submit" class="btn btn-primary">Update Category</button>
  </form>
@endsection