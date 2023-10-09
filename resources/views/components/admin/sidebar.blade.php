<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column mb-3">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.index')) active @endif"
                        @if(request()->routeIs('admin.index')) aria-current="page" @endif href="
                        <?=route('admin.index')?>">
                        <svg class="bi">
                            <use xlink:href="#house" />
                        </svg>
                        Панель управления
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2
                        @if(request()->routeIs('admin.news.*'))
                            active
                        @endif" @if(request()->routeIs('admin.news.*'))
                        aria-current="page"
                        @endif
                        href="{{ route('admin.news.index') }}">
                        <svg class="bi">
                            <use xlink:href="#news" />
                        </svg>
                        Новости
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 @if(request()->routeIs('admin.categories.*')) active @endif"
                        @if(request()->routeIs('admin.categories.*')) aria-current="page" @endif href="{{
                        route('admin.categories.index') }}">
                        <svg class="bi">
                            <use xlink:href="#categories" />
                        </svg>
                        Категории
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2
                        @if(request()->routeIs('admin.users.*'))
                            active
                        @endif" @if(request()->routeIs('admin.users.*'))
                        aria-current="page"
                        @endif
                        href="{{ route('admin.users.index') }}">
                        <svg class="bi">
                            <use xlink:href="#people" />
                        </svg>
                        Пользователи
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2
                        @if(request()->routeIs('admin.users.*'))
                            active
                        @endif" @if(request()->routeIs('admin.users.*'))
                        aria-current="page"
                        @endif
                        href="{{ route('admin.parser') }}">
                        <svg class="bi">
                            <use xlink:href="#parse" />
                        </svg>
                        Парсер
                    </a>
                </li>
                <hr class="my-3">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <svg class="bi">
                            <use xlink:href="#door-closed" />
                        </svg>
                        Выход
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                {{-- <hr class="my-3"> --}}
            </ul>
        </div>
    </div>
</div>
