<nav class="p-3 bg-dark text-white ">
    <div class="container-fluid">
      
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none ">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>
        <div class="col-2 text-start ">
          <b>
            <a class="text-white navbar-brand"  href="{{ route('home') }}">
              {{config('app.name')}}
            </a>
          </b>
      </div>
        @foreach($topics as $topic)    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 me-3" >
              <li><a href="{{ route('topic.show',$topic)}}"  style="color:white" class=" btn-outline-danger nav-link px-1  ps-1 pe-1 me-1 " >{{$topic->title}}</a></li>
            </ul>
        @endforeach
     
        <form class="col-12 col-lg-auto ms-3  mb-lg-0 me-lg-3 ">
          <input type="search" class="form-control form-control-dark" placeholder="Search..."  style="color:#f55247" aria-label="Search">
        </form>

      
          @auth <!--be van jelentkezve-->
          <a class="btn btn-sm btn-outline-light btn-primary"  href="{{ route('post.create')}}" style="background-color: #f55247">
            {{__('Publikálás')}}
          </a>
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " style="color:#f55247" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="rounded-circle me-2" width="25" src="{{ Auth::user()->avatar }}" />
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="#">
                        {{ __('Profile') }}
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit">
                            {{ __('Sign out') }}
                        </button>
                    </form>
                </li>
            </ul>
          </div>
          @else    <!--nincs bejelentkezve-->
            <a href="{{route('login')}}" class="btn btn-outline-light me-2 " style="background-color:#f55247">
              {{__('Login')}}
            </a>
            <a href="{{route('register')}}" class="btn btn-outline-light  ms-2" style="background-color:#f55247">
              {{__('Sign up')}}
            </a>
          @endauth
         


        </div>
      </div>
    </div>
</nav> 