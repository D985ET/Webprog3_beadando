@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-9 col-md-10 mx-auto"> <!--largescreeneken 9et használok el, és mediumon meg 8at-->
        <div class="card">
            <div class="card-body">
                <h3 class="display-3">{{__('Publish')}}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{route('post.create')}}" method="POST">
                    @csrf
                    <div class="mb-3"> <!--margin bottom 3-->
                        <label for="title">{{__('Title')}}</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="topic_id">{{__('Topic')}}</label>
                        <select name="topic_id" class="form-control">
                            <option value="">{{__('Please choose')}}</option>
                            @foreach($topics as $topic)
                                <option value="{{$topic->id}}">{{$topic->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3"> 
                        <label for="maxPlayer">{{__('MaxPlayer')}}</label>
                        <input class="form-control" type="number" name="maxPlayer" min="1" max="12">
                    </div>
                    <div class="mb-3">
                        <label for="desciption">{{__('Description')}}</label>
                        <textarea class="form-control " name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content">{{__('Content')}}</label>
                        <textarea class="form-control " name="content"></textarea>
                    </div>
                    <div class="d-grid">
                            <button  class="btn btn-primary btn-outline-dark btn-lg" style="background-color: #f55247">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection