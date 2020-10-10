@extends('layouts.app')

@section('content')
<div class="m-5">
    <h1>{{$tittle}} </h1>
    @if(count($services)>0)
        <ul>
            @foreach($services as $service)
                <li>  {{$service}} </li>
            @endforeach
        </ul>
    @endif
    
</div>

@endsection