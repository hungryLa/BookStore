<?php

use App\Models\Creator;
use App\Models\Type;

if (auth()->user()) {
    $nameOfUser = auth()->user()->name;
};
$types = Type::orderBy('name')->get();
$creators = Creator::orderBy('FName')->orderBy('SName')->get();
?>

<header class="site-header sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">IStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Авторы
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDropdown">
                            @foreach($creators as $creator)
                                <li>
                                    <a class="dropdown-item"
                                       href="{{route('CreatorsProducts',['id'=>$creator->id])}}">
                                        {{$creator->FName}} {{$creator->SName}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Жанры
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDropdown">
                            @foreach($types as $type)
                                <li>
                                    <a class="dropdown-item"
                                       href="{{route('ProductsOfThisType',['type' => $type->code])}}">
                                        {{$type->name}}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="nav-item">
                        <form action="{{route('search')}}" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" >
                            <input type="text" class="form-control" name="searchLine" id="searchLine" placeholder="Поиск по сайту">
                        </form>
                    </div>
                </ul>

                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @guest()
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Личный кабинет
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('basket')}}">Корзина</a></li>
                                    <li><a class="dropdown-item" href="{{route('login')}}">Войти</a></li>
                                    <li><a class="dropdown-item" href="{{route('register')}}">Зарегистрироваться</a>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                        @auth()
                            @if(auth()->user())
                                <div class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        {{$nameOfUser}}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-light" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{route('cabinet.index')}}">Личный кабинет</a></li>
                                        @if(auth()->user()->is_admin == 1)
                                            <li><a class="dropdown-item" href="{{route('adminMain')}}">Админка</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{route('cabinet.favorites')}}">Избранные</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{route('basket')}}">Корзина</a></li>
                                        <li><a class="dropdown-item" href="{{route('logout')}}">Выйти</a></li>
                                    </ul>
                                </div>
                            @endif
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
