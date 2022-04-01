@extends('layouts.main') 

@section('content')
<div class="card-group">
        @foreach($posts as $post) 
            @include('post._item')
        @endforeach
    
</div>

{{$posts->links()}} <!--nyomógomb-->


@endsection 