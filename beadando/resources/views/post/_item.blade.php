<div class="col-md-8 col-lg-6 mx-auto" style="max-width:30rem">
    <div class="card mb-3">
        <div class="card-body" >
            <div class="d-flex text-center">
                <img class="card-img-top" width="200" height="300" src="{{$post->cover_image }}" alt="{{ $post->title }}" style="object-fit: cover;"> 
                
            </div>
            <div class="ms-3 text-center" >
                <h5 class="display-5">{{$post->title}}</h5>
                <p class="card-text"></p>
                <a style="text-decoration: none;" href="{{ route('topic.show', $post->topic) }}">
                    {{ $post->topic->title }}
                </a> | {{__('Maximum játékos: ') }}{{$post->maxPlayer}}{{__(' fő') }}
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