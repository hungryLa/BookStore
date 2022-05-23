@extends("layouts.app")

@section("title")
    Главная
@endsection

@section('content')
    <h2 style="text-align: center;" class="mb-4">Книги</h2>

    <div class="row">
        @foreach($books as $book)
            <div class="col-3 mb-3" style="border:0px solid ">
                @include('layouts.book',['book' => $book])
            </div>
        @endforeach
    </div>
@endsection

@section('asside')
    @include('inc.aside')
@endsection
