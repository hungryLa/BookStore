<?php
    use App\Models\Author;
    use App\Models\Genre;

    $genres = Genre::orderBy('name')->get();
    $authors = Author::orderBy('SName')->orderBy('FName')->get();
?>
<div>
        <div class="list-group mt-3" style="position: fixed;">
            <form action="{{route('search')}}">
                <input type="text" name="searchLine" id="searchLine" placeholder="Поиск по сайту">
                <button type="submit">Найти</button>
            </form>
            <h4 class="mb-3" style="text-align: center;">Жанры</h4>
            @foreach($genres as $genre)
                <a class = "list-group-item list-group-item-action" style="color: black;" href="{{route('BooksOfThisGenre',['genre' => $genre->code])}}">
                    {{$genre->name}}
                </a>
            @endforeach
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Авторы</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($authors as $author)
                        <li><a class="dropdown-item" href="{{route('AuthorsBooks',['id'=>$author->id])}}">{{$author->FName}} {{$author->SName}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

</div>
