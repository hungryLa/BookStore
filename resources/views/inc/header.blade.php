<?php
if(auth()->user()){
    $nameOfUser = auth()->user()->name;
};
?>
<header class="site-header sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">BookStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(auth()->user())
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                {{$nameOfUser}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(auth()->user()->is_admin == 1)
                                    <li><a class="dropdown-item" href="{{route('adminMain')}}">Админка</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{route('logout')}}">Выйти</a></li>
                            </ul>
                        </div>
                    @endif
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest()
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('basket')}}">Корзина</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('login')}}">Войти</a>
                        </li>

                    @endguest

                    @auth()

                        <li class="nav-item active" >
                            <a class="nav-link" href="{{route('editDB')}}">Добавить книгу</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('basket')}}">Корзина</a>
                        </li>
                    @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    {{--<nav class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2 d-none d-md-inline-block" href="{{route('home')}}">Главная</a>
        @guest()
            <a class="py-2 d-none d-md-inline-block" href="{{route('login')}}">Войти</a>
            <a class="py-2 d-none d-md-inline-block" href="{{route('reqister')}}">Зарегистрироваться</a>
        @endguest
        @auth()
            <a class="py-2 d-none d-md-inline-block" href="{{route('editDB')}}">Редактирование БД</a>
            <a class="py-2 d-none d-md-inline-block" href="{{route('logout')}}">Выйти</a>
        @endauth
    </nav>--}}
</header>
