@extends('layouts.main')

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

@auth
@if(Auth::user()->isAdmin == true)
@section('content')

<form action="{{ route('post.edit', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="d-flex align-items-center mb-3">
        <h3 class="display-3">{{ __('message.Updating:') }} {{ $post->title }}</h3>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-6">
            <div class="card">
                <div class="card-body">
                    <x-forms.input name="title" label="{{ __('message.Title') }}" value="{{ $post->title }}" />
                    <div class="mb-3"> 
                        <label for="maxPlayer">{{__('message.Maximum player')}}</label>
                        <input class="form-control {{$errors->has('maxPlayer') ? ' is-invalid' : '' }}" type="number" name="maxPlayer" min="1" max="12" value={{old('maxPlayer',$post->maxPlayer)}}>
                        @if($errors->has('maxPlayer'))<!--ha az errorban benne van valami-->
                            <p class="invalid-feedback">{{$errors->first('maxPlayer')}}</p><!--első hibaüzenetet megakarom jeleníteni-->
                        @endif
                    </div>   
                    <div class="mb-3">
                        <label for="description">{{ __('message.Description') }}</label>
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('description', $post->description) }}</textarea>
                        @if ($errors->has('description'))
                            <p class="invalid-feedback">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="content">{{ __('message.Content') }}</label>
                        <textarea id="editor" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content">{{ old('content', $post->content) }}</textarea>
                        @if ($errors->has('content'))
                            <p class="invalid-feedback">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="topic_id">{{ __('message.Topic') }}</label>
                        <select class="form-control{{ $errors->has('topic_id') ? ' is-invalid' : '' }}" name="topic_id">
                            <option value="">{{ __('message.Please choose') }}</option>
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}" {{ old('topic_id', $post->topic_id) == $topic->id ? 'selected' : '' }}>
                                    {{ $topic->title }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('topic_id'))
                            <p class="invalid-feedback">{{ $errors->first('topic_id') }}</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="cover">{{ __('message.Game image') }}</label>
                        <input class="form-control{{ $errors->has('cover') ? ' is-invalid' : '' }}" type="file" name="cover" value="{{ old('cover') }}">
                        @if ($errors->has('cover'))
                            <p class="invalid-feedback">{{ $errors->first('cover') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <button class="btn btn-primary btn-outline-dark btn-lg" style="background-color: #f55247" type="submit">
                {{ __('message.Update') }}
            </button>
        </div>
       
    </div>

</form>

<form action="{{ route('post.destroy', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    
        <button class="btn btn-primary btn-outline-dark btn-lg" style="background-color: #f55247" type="submit">
            {{ __('message.Delete') }}
        </button>
  

</form>

@endif
@endauth
@endsection
