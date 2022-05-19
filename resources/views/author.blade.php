@extends("layouts.app")

@section("title")Произведения {{$author->FName}} {{$author->SName}}@endsection

@section('content')<h2 style="text-align: center; font-family:Arial;" class="mb-4">{{$author->FName}} {{$author->SName}}</h2>

<div class="row">
    @foreach($books as $book)
        <div class="col-3 mb-3" style="border:0px solid ">
            @include('layouts.book',['book' => $book])
        </div>
    @endforeach
</div>
@endsection

