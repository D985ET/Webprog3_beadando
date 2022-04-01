@extends('layouts.main') 

@section('content')
<div class="card-group">
        @foreach($posts as $post) 
            <div class="col-md-8 col-lg-6 mx-auto" style="max-width:30rem">
                <div class="card mb-3">
                    <div class="card-body" >
                        <div class="d-flex text-center">
                            <img class="card-img-top" width="150" height="200" src="https://via.placeholder.com/350" alt="{{ $post->title }}">
                        </div>
                        <div class="ms-3 text-center">
                            <h5 class="display-5">{{$post->title}}</h5>
                            <p class="card-text"></p>
                                {{$post->topic->title}} | {{__('Maximum játékos: ') }}{{$post->maxPlayer}}{{__(' fő') }}
                            </p>
                            <p class="fw-bold">
                                {{$post->description}}
                            </p>
                            <div class="card-footer ">
                                <a class="btn btn-primary btn-outline-dark " style="background-color: #f55247" href="{{route('post.details',$post)}}">Részletek</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    
</div>



       

{{$posts->links()}} <!--nyomógomb-->


@endsection 