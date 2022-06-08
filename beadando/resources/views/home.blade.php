@extends('layouts.main') 

@section('content')
<div >
    <header>
        <div class="text-center mt-3 mb-5">
            <h4 class="display-4">
                {{__('message.Üdvözöllek a Magnus Társasjátékboltban!')}}
            </h4>
        </div>
    </header>
  </div>
<div class="card-group">
        @foreach($posts as $post) 
            @include('post._item')
        @endforeach
    
</div>

{{$posts->links()}} <!--nyomógomb-->


@endsection 