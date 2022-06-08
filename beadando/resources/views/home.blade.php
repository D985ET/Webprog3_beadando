@extends('layouts.main') 

@section('content')
@auth
<div >
    <header>
        <div class="text-center mt-3 mb-5">
            <h4 class="display-4">
                {{__('message.Üdvözöllek ' )}}{{__(Auth::user()->name)}}{{ __('message. a Magnus Társasjátékboltban!')}}
            </h4>
        </div>
    </header>
  </div>

<div class="card-group">
        @foreach($posts as $post) 
            @include('post._item')
        @endforeach
</div>
@else
<div>
    <header>
        <div class="d-grid mt-3 mb-5">
            <a class="btn btn-primary btn-outline-dark btn-lg" style="background-color: #f55247" href="{{ route('login') }}">
                {{__('message.Jelentkezz be!' )}}
            </a>
        </div>
    </header>
  </div>
<div class="card-group">
    @foreach($posts as $post) 
        @include('post._item')
    @endforeach
</div>
@endauth
{{$posts->links()}} <!--nyomógomb-->


@endsection 