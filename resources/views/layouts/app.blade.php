<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    @include('inc.header')

    <div id = "borderBody">
        <div class = "container p-3">
            @include('inc.messages')

            <div class="row">
                @if((Route::is('editDB')))
                    <div class="col-12">
                        @yield('content')
                    </div>
                @elseif((Route::is('home')) || (Route::is('BooksOfThisGenre')))
                    <div class="col-9 ">
                        @yield('content')
                    </div>
                    <div class="col-3 asside rounded">
                        @yield('asside')
                    </div>
                @else
                    <div class="col-12">
                        @yield('content')
                    </div>
                @endif
            </div>
        </div>
    </div>

</body>
</html>
