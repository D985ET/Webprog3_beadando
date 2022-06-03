@extends('layouts.main')

<!-- editoroknak a scriptjét ide, ahova elhelyeztem oda fogja megjeleníteni, content-nek akarom tenni szóval oda kell berakni-->
@push('scripts') 
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error( error )
        })
</script>
@endpush

@section('content')
<form action="{{route('post.create')}}" method="POST" enctype="multipart/form-data"><!--enctype-al már menni fog a kép küldés-->
@csrf
<div class="text-center mb-3 align-items-center">
    <h3 class="display-3">{{__('message.Upload')}}</h3>
</div>
<div class="row">
    <div class="col-lg-8 col-md-6 "> <!--largescreeneken 9et használok el, és mediumon meg 8at-->
        <div class="card">
            <div class="card-body">
                <x-forms.input name="title" label="{{ __('message.Title') }}"  autocomplete="off" /> <!-- x-mappa.fájlnév -->
                    
                    <div class="mb-3"> 
                        <label for="maxPlayer">{{__('message.Maximum player')}}</label>
                        <input class="form-control {{$errors->has('maxPlayer') ? ' is-invalid' : '' }}" type="number" name="maxPlayer" min="1" max="12" value={{old('maxPlayer')}}>
                        @if($errors->has('maxPlayer'))<!--ha az errorban benne van valami-->
                            <p class="invalid-feedback">{{$errors->first('maxPlayer')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="description">{{__('message.Description')}}</label>
                        <textarea class="form-control {{$errors->has('description') ? ' is-invalid' : '' }}" name="description" >{{old('description')}}</textarea>
                        @if($errors->has('description'))<!--ha az errorban benne van valami-->
                            <p class="invalid-feedback">{{$errors->first('description')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="content">{{__('message.Content')}}</label>
                        <textarea id="editor" class="form-control {{$errors->has('content') ? ' is-invalid' : '' }}" name="content">{{old('content')}}</textarea>
                        @if($errors->has('content'))<!--ha az errorban benne van valami-->
                            <p class="invalid-feedback">{{$errors->first('content')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                        @endif
                    </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="topic_id">{{__('message.Topic')}}</label>
                    <select name="topic_id" class="form-control {{$errors->has('topic_id') ? ' is-invalid' : '' }}">
                        <option value="">{{__('message.Please choose')}}</option>
                        @foreach($topics as $topic)
                            <option value="{{$topic->id}}" {{old('topic_id') == $topic->id ? 'selected' : ''}}>
                                {{$topic->title}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('topic_id'))<!--ha az errorban benne van valami-->
                        <p class="invalid-feedback">{{$errors->first('topic_id')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                    @endif
                </div>
                <div class="mb-3"> <!--margin bottom 3-->
                    <label for="cover">{{__('message.Game image')}}</label>
                    <input type="file" class="form-control {{$errors->has('cover') ? ' is-invalid' : '' }}" name="cover" value="{{old('cover')}}"> <!--kell az is invalid-->
                    @if($errors->has('cover'))<!--ha az errorban benne van valami-->
                        <p class="invalid-feedback">{{$errors->first('cover')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-grid">
    <button  class="btn btn-primary btn-outline-dark btn-lg" style="background-color: #f55247">{{__('message.Upload')}}</button>
</div>
</form>
@endsection