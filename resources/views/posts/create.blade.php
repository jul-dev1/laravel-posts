@extends('layouts.app')

@section('content')
<div class="m-5  ">
    <h1> Create Post </h1>
    <form action="{{url('./posts')}}" method="POST" enctype="multipart/form-data" >
    @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control"  name="body" placeholder="Body" rows="5"></textarea>
  </div>
<!-- image input -->
  <div class="form-group">
    <label for="cover_image">Image upload: </label>
    <input type="file" name="cover_image">
  </div>
  
  <button  type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
   
    
    
</div>

@endsection