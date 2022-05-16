<div class="col-3">
    <img class="img-fluid" src="{{asset('storage/books/'.$book->image)}}" alt="Обложка">
</div>
<div class="col-9">
    <h5 class="card-title">{{ $book->name }}</h5>
    <p class="card-text">
        Автор: {{ $book->author->FName }} {{ $book->author->SName }} <br>
        Издательство: {{ $book->pubHouse }}<br>
        @foreach($book->genres as $genre)
            <a href="{{route('BooksOfThisGenre',['genre'=> $genre->code])}}">#{{$genre->name}}</a>
        @endforeach
        <form action="{{route('basket-add',$book->id)}}" method="post">
            @csrf
            <h6>В наличии {{$book->in_stock}} шт.</h6>
            <button type = "submit" class = "btn btn-success">В корзину</button>
            <nobr class="ml-4">{{$book->price}} руб</nobr>
        </form>
    </p>
</div>
