<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id = "borderBody" class="min-vh-100">
        @include('inc.header')
        <div class = "container p-3">

            <div class="row">

                @if((Route::is('editDB')))
                    <div class="col-12">
                        @include('inc.messages')
                        @yield('content')
                    </div>
                @else
                    <div class="col-9 ">
                        @include('inc.messages')
                        @yield('content')
                    </div>
                    <div class="col-3 asside rounded">
                        @yield('asside')
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
