@extends("layouts.app")

@section("title")
    Главная
@endsection

@section('content')
    <div class="row">
        @if(count($books) != 0)
            <h2 style="text-align: center;" class="mb-4">По названию</h2>
            @foreach($books as $book)
                <div class="col-3 mb-3" style="border:0px solid ">
                    @include('layouts.book',['book' => $book])
                </div>
            @endforeach
        @endif

        @if(count($authors) != 0)
            <h2 style="text-align: center;" class="mb-4">По автору</h2>
            @foreach($authors as $author)
                @foreach($allBooks as $book)
                    @if($book->author_id == $author->id)
                        <div class="col-3 mb-3" style="border:0px solid ">
                            @include('layouts.book',['book' => $book])
                        </div>
                    @endif
                @endforeach
            @endforeach
        @endif
    </div>
@endsection

@section('asside')
    @include('inc.aside')
@endsection
