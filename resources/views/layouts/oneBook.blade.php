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
    </p>
</div>
