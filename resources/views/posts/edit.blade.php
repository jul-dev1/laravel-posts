@extends('layouts.app')

@section('content')
<div class="m-5  ">
    <h1> Edit Post </h1>
    <form action="{{url('./posts/'.$posts->id)}}" method="POST"  enctype="multipart/form-data">
    @method('PUT')
    @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" value="{{$posts->title}} ">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control"  name="body"  rows="5">{{$posts->body}}</textarea>
  </div>
  
  <div class="form-group">
    <label for="cover_image">Image upload: </label>
    <input type="file" name="cover_image">
  </div>
  
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
   
    
    
</div>

@endsection