<header class="site-header sticky-top py-1">
    <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand" href="{{route('home')}}">BookStore</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto grid">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Главная</a>
                </li>
                <li class="nav-item active">

                </li>
                <li class="nav-item active">

                </li>

                @guest()
                    <li class="nav-item active">

                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('basket')}}">Корзина</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('login')}}">Войти</a>
                    </li>
                @endguest

                @auth()
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('basket')}}">Корзина</a>
                    </li>
                    <li class="nav-item active" >
                        <a class="nav-link" href="{{route('editDB')}}">Редактирование БД</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('logout')}}">Выйти</a>
                    </li>
                @endauth
            </ul>
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
