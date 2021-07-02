@extends("layouts.app")

@section("title"){{$book->name}}@endsection

@section('content')
<div class="row mt-5">
    @include('layouts.oneBook',['book' => $book])
</div>

@endsection
