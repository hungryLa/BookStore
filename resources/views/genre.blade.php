@extends("layouts.app")

@if($genre)
    @section("title"){{$genre->name}}@endsection

    @section('content')<h2 class = "mb-4" style="text-align: center">{{$genre->name}}</h2>

    <div class="row">

        @foreach($genre->books as $book)
            <div class="col-4" style="border:0px solid ">
                @include('layouts.book',['book' => $book])
            </div>
        @endforeach
    </div>
    @endsection
    @section('asside')
        @include('inc.asside',['genres'=> $genres])
    @endsection
@else
    @section('content')
        <h2 class = "mb-4" style="text-align: center">404 Такого жанра нету</h2>
    @endsection
    @section('asside')
        @include('inc.asside',['genres'=> $genres])
    @endsection
@endif
