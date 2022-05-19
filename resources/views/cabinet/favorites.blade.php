@extends("layouts.app")

@section("title")Избранные@endsection

@section('content')<h2 style="text-align: center; font-family:Arial;" class="mb-4">Избранные</h2>

<div class="row">
    @foreach($books as $book)
        <div class="col-4 mb-3" style="border:0px solid ">
            @include('layouts.book',['book' => $book])
        </div>
    @endforeach
</div>
@endsection

@section('asside')
    @include('inc.asside')
@endsection
