@extends('layouts.main')

@section('content')
<div class="col-md-8 col-lg-6 mx-auto" >
    <div class="text-center">
        <h4 class="mb-3">{{ __('Profile:') }}</h4>
    
        <img class="mb-3 rounded-circle" src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle">
        <h4 class="mb-3">{{ $user->name }}</h4>
        <h6>{{__('Posts made by')}} {{__('"')}} {{$user->name}}{{ __('" :') }} {{$user->posts->count()}}</h6>
    </div> 
</div>
<div class="container">
    <div class="row h-20 ">
        @forelse($posts as $post)
                @include('post._item')
        @empty <!--ha üres akkor mit jelenítsen meg-->
            <div class="alert alert-secondary" role="alert">
                {{ __('No posts to show') }}
            </div>
        @endforelse
        {{ $posts->links() }}
    </div>
</div>
  
    

@endsection