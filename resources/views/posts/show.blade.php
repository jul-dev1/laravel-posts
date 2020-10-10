@extends('layouts.app')

@section('content')
<div class="m-5  ">
    <div class="md-5">
        <img class="img-fluid"  src="/laravel-project/laraa/public/storage/cover_image/{{$posts->cover_image}}"> 
        <!-- or    -->
        <!-- <img src="{{ url('') }}/storage/cover_image/{{$posts->cover_image}}"> -->
    </div>
    <h1> {{$posts->title}} </h1>
    <p>{{$posts->body}}</p>
    <small>{{$posts->created_at->diffForHumans()}}</small>
    <hr>
    <!-- <a href="./{{$posts->id}}/edit" class="btn btn-primary">Edit</a> -->
    <!-- <a href="./{{$posts->id}}" class="btn btn-danger">Delete</a> -->

    <!-- <form action="{{url('./posts/'.$posts->id)}}" method="POST" >
    @method('DELETE')
    @csrf
    
    </form> -->
    @if(!Auth::guest())
        @if(Auth::user()->id==$posts->user_id)
            <form   method="post" action="{{url('./posts/'.$posts->id)}}">
                    @csrf
                    @method('delete')
                    <a href="./{{$posts->id}}/edit" class="btn btn-primary" >Edit</a>
                    <!-- Button -->
                    <div class="d-inline ">
                        <button id="submit" name="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete?');" >Delete</button>
                    </div>     
            </form>
        @endif
    @endif
   

   


</div>
    


@endsection