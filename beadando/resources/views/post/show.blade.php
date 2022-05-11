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
<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <h5 class="display-5">
            {{__('Comments')}} <!--tudunk hivatkozni egy json file-ban erre, pl hu.json-ben, app.php-ban kell átírni a nyelvet-->
        </h5>
        <form action="{{route('post.comment',$post)}}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" name="comment"></textarea>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary">
                    {{__('Comment')}}
                </button>
            </div>
        </form>
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
</div>

@endsection