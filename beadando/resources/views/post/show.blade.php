@extends('layouts.main')

@section('content')
<div class="d-flex text-center ">
    <img class="card-img-left " width="300" height="300" src="{{$post->cover_image }}" alt="{{ $post->title }}" > 
    <b><h1 class="ml-3 display-1 ms-4">{{$post->title}}</h1></b>
</div>

<div class="border-top border-4 mb-2">  
</div>
<p> {{$post->topic->title}} | {{__('Maximum: ')}}{{$post->maxPlayer}} {{__('fő számára')}} | {{$post->created_at->diffForHumans()}}</p>
<p class="fw-bold">{{$post->description}}</p>

<div>
    <h5>{{__('Játék leírás:')}}</h5>
    {!!$post->content!!} <!--rendereli a html-t-->
</div>

<div class="d-grid mb-2">
    @can('update',$post)
        <a class="btn btn-primary btn-outline-dark " style="background-color: #f55247" href="{{route('post.edit',$post)}}">
            {{__('message.Edit')}}
        </a>
    @endcan
</div>
<div class="border-top border-4 mb-2">  
</div>
<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
  
       
        <h5 class="display-5 text-center">
            {{__('message.Comments')}}
        </h5>
        @auth
        <form action="{{route('post.comments',$post)}}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea class="form-control {{$errors->has('comment') ? ' is-invalid' : '' }}" name="comment">{{old('comment')}}</textarea>  
                    @if($errors->has('comment'))<!--ha az errorban benne van valami-->
                        <p class="alert alert-danger">{{$errors->first('comment')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                    @endif
            </div>
              
            <div class="d-grid">
                <button  class="btn btn-primary btn-outline-dark btn-lg" style="background-color: #f55247">
                    {{__('message.Comment')}}
                </button>
            </div>
        </form>
        @else
        <div class="d-grid">
            <a class="btn btn-primary btn-outline-dark btn-lg" style="background-color: #f55247" href="{{ route('login') }}">
                {{__('message.Jelentkezz be!' )}}
            </a>
        </div>
        @endif
        <div class="mt-5">
            @foreach($post->comments as $comment)
                <div class="card mb-3" id="comment-{{$comment->id}}">
                    <div class="card-body">
                        <div class="mb-3 d-flex">
                            <div class="d-flex">
                                <a href="{{ route('profile.show', $comment->user) }}">
                                    <img class="rounded-circle me-2" width="25" src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}">
                                </a>
                                <a href="{{ route('profile.show', $comment->user) }}">
                                    {{ $comment->user->name }}
                                </a>
                            </div>
                            <span class="ms-3">
                                {{ $comment->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <div style="white-space: pre-line;">
                            {{ $comment->message }}
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>

@endsection