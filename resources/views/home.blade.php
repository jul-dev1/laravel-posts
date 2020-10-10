@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                    <hr>
                    <a href="./posts/create" class="btn btn-outline-primary m-2">Create</a>
                    <hr>
                        <div>    
                             @if(count($posts)>0)

                                <table class="table table-striped table-dark">
                                    <tr>
                                    <th >#</th>
                                    <th >Title</th>
                                    <th >Body</th>
                                    </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <th >{{$post->id}}</th>
                                        <th><strong><a href="./posts/{{$post->id}}"> {{$post->title}} </strong></a></td>
                                        <th>{{$post->body}}</th>
                                    </tr>
                                    
                                @endforeach
                                </table>
                            @else
                            <h1>You have no Posts</h1>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
