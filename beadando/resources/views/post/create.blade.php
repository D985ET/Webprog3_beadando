@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-9 col-md-10 mx-auto"> <!--largescreeneken 9et használok el, és mediumon meg 8at-->
        <div class="card">
            <div class="card-body">
                <h3 class="display-3">{{__('Publish')}}</h3>
                <form action="{{route('post.create')}}" method="POST">
                    @csrf
                    <div class="mb-3"> <!--margin bottom 3-->
                        <label for="title">{{__('Title')}}</label>
                        <input type="text" class="form-control {{$errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{old('title')}}"> <!--kell az is invalid-->
                        @if($errors->has('title'))<!--ha az errorban benne van valami-->
                            <p class="invalid-feedback">{{$errors->first('title')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="topic_id">{{__('Topic')}}</label>
                        <select name="topic_id" class="form-control {{$errors->has('topic_id') ? ' is-invalid' : '' }}">
                            <option value="">{{__('Please choose')}}</option>
                            @foreach($topics as $topic)
                                <option value="{{$topic->id}}" {{old('topic_id') == $topic->id ? 'selected' : ''}}>
                                    {{$topic->title}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('topic_id'))<!--ha az errorban benne van valami-->
                            <p class="invalid-feedback">{{$errors->first('topic_id')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                        @endif
                    </div>
                    <div class="mb-3"> 
                        <label for="maxPlayer">{{__('MaxPlayer')}}</label>
                        <input class="form-control {{$errors->has('maxPlayer') ? ' is-invalid' : '' }}" type="number" name="maxPlayer" min="1" max="12" value={{old('maxPlayer')}}>
                        @if($errors->has('maxPlayer'))<!--ha az errorban benne van valami-->
                            <p class="invalid-feedback">{{$errors->first('maxPlayer')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="description">{{__('Description')}}</label>
                        <textarea class="form-control {{$errors->has('description') ? ' is-invalid' : '' }}" name="description" >{{old('description')}}</textarea>
                        @if($errors->has('description'))<!--ha az errorban benne van valami-->
                            <p class="invalid-feedback">{{$errors->first('description')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="content">{{__('Content')}}</label>
                        <textarea class="form-control {{$errors->has('content') ? ' is-invalid' : '' }}" name="content">{{old('content')}}</textarea>
                        @if($errors->has('content'))<!--ha az errorban benne van valami-->
                            <p class="invalid-feedback">{{$errors->first('content')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                        @endif
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