@extends('layouts.app')

@section('content')
<div class="m-5  ">
    <h1> Posts </h1>
    @if(count($posts)>0)
        <ul>
            @foreach($posts as $post)
                <div class="p-3" >
                    <li> <strong><a href="./posts/{{$post->id}}"> {{$post->title}} </strong> </li>
                    <!-- <img style="width: 200px;" class="img-fluid"  src="/laravel-project/laraa/public/storage/cover_image/{{$post->cover_image}}">  -->
                    </a>
                    <hr>
                    <small> Written {{$post->created_at->diffForHumans()}}</small>
                    
                </div>
                
                
                
            @endforeach
        </ul>
        <div  class="d-flex justify-content-center">
             {{ $posts->links("pagination::bootstrap-4") }}
        </div>
         
    </div>
       
    @endif
   

@endsection