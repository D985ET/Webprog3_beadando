@extends('layouts.main')

@section('content')
<div class="d-flex text-center ">
    <img class="card-img-left " width="300" height="300" src="{{$post->cover_image }}" alt="{{ $post->title }}" > 

    <b><h1 class="display-1 mt-4" >{{$post->title}}</h1></b>
</div>
<div class="border-top border-5 mb-2">
    
</div>
<p> {{$post->topic->title}} | {{__('Maximum: ')}}{{$post->maxPlayer}} {{__('fő számára')}} | {{$post->created_at->diffForHumans()}}</p>
<p class="fw-bold">{{$post->description}}</p>

<div>
    <h5>{{__('Játék leírás:')}}</h5>
    {!!$post->content!!} <!--rendereli a html-t-->
</div>

@endsection