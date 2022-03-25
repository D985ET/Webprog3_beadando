@extends('layouts.main') 

@section('content')
<div class="row">
    <div class="card-deck">
        @foreach($posts as $post)
            <div class="col-lg-3 col-md-5 mx-auto">
                <div class="card text-center">
                    <img class="card-img-top" width="200" height="200"src="https://via.placeholder.com/350" alt="{{$post->title}}">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                            <p class="card-text"></p>
                                {{$post->topic->title}} | {{__('Maximum játékos: ') }}{{$post->maxPlayer}}{{__(' fő') }}
                            </p>
                                <p class="fw-bold ">
                                    {{$post->description}}
                                </p>
                                <div class="card-footer text-center">
                                    <a class="btn btn-primary btn-outline-dark " style="background-color: #f55247" href="{{route('post.details',$post)}}">Részletek</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
{{$posts->links()}} <!--nyomógomb-->


@endsection 