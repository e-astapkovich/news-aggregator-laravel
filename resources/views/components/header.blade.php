<div class="container">
    <header mb-4>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-5">
            <div class="container">
                <div class="col mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <img width="120" height="60" src="{{ asset('assets/img/logo.png') }}" alt="logo">
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('welcome') }}" class="nav-link px-2 @if(request()->routeIs('welcome')) link-secondary @endif">Главная</a></li>
                    <li><a href="{{ route('news.index') }}" class="nav-link px-2 @if(request()->routeIs('news.index')) link-secondary @endif">Новости</a></li>
                    <li><a href="{{ route('categories.index') }}" class="nav-link px-2 @if(request()->routeIs('categories.index')) link-secondary @endif">Категории</a></li>
                    @auth
                        @if (Auth::user()->is_admin)
                            <li><a href="{{ route('admin.index') }}" class="nav-link px-2 @if(request()->routeIs('admin.*')) link-secondary @endif">Админка</a></li>
                        @endif
                    @endauth
                </ul>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->avatar !== null)
                                <li class="nav-item">
                                    <img src="{{ Auth::user()->avatar }}" width="50px" alt="фото пользователя">
                                </li>

                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</div>
