<div>
        <div class="list-group mt-3" style="position: fixed;">
            <h4 class="mb-3" style="text-align: center;">Жанры</h4>
            @foreach($genres as $genre)
                <a class = "list-group-item list-group-item-action" style="color: black;" href="{{route('BooksOfThisGenre',['genre' => $genre->code])}}">
                    {{$genre->name}}
                </a>
            @endforeach
        </div>
</div>
