@extends('layouts.main')

@section('content')
<h1 class="display-1">{{$post->title}}</h1>
<p>{{$post->author->name}} | {{$post->topic->title}} | {{__('Maximum: ')}}{{$post->maxPlayer}} {{__('fő számára')}} | {{$post->created_at->diffForHumans()}}</p>
<p class="fw-bold">{{$post->description}}</p>

<div>
    <h5>{{__('Játék leírás:')}}</h5>
    {{$post->content}}
</div>
@endsection