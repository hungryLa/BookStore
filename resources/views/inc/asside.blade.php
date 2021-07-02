<div>
        <ul class="list-group mt-3">
            <h4 class="mb-3" style="text-align: center;">Жанры</h4>
            @foreach($genres as $genre)
                <li class="list-group-item"><a style="color: black;" href="{{route('BooksOfThisGenre',['genre' => $genre->code])}}">{{$genre->name}}</a></li>
            @endforeach
        </ul>
</div>
