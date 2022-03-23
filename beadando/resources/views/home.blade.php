@extends('layouts.main') 

@section('content')
<div class="row">
<div class="col-md8 col-lg-6 mx-auto">
    @foreach($topic as $topics)
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex">
                <img width="150" height="150" src="https://via.placeholder.com/350" alt=" {{$topics->title}}">
                <div class="ms-3">
                    {{$topics->topic->title}}
                </div>
                <p class="fw-bold">
                    {{$topics->description}}
                </p>
                <p class="text-end">
                    <a href="{{route('post.details',$topics)}}" class="btn btn-sm btn-primary">
                        Read more
                    </a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>

@endsection