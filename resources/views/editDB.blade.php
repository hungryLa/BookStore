@extends('layouts.app')

@section('title')Добавить книгу@endsection

@section('content')
    <div class="mx-auto border p-3">
        <h2 style = "width:30%;margin-left:35%;">Добавить книгу</h2>
        <form action="{{route("editDB.store")}}" method ="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Название книги:</label>
                <input type="text" name="name" placeholder="Введите название книги" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="author">Автор книги:</label><br>
                <select name="author" id="author" style="width:100%;">
                    <option value="0">Выберите автора</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->FName}} {{$author->SName}}</option>
                    @endforeach
                    <option value="255">Моего автора нету(</option>
                </select>
            </div>
            <div class="form-group container">
                <label for="genre">Жанр книги:</label>
                @foreach($genres as $genre)
                <div class = "row"><div class="col-sm"><input type="checkbox" name="genres[]" value="{{$genre->id}}"> {{$genre->name}}</div></div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="pubHouse">Издательство книги:</label>
                <input type="text" name="pubHouse" placeholder="Введите издательство книги" id="pubHouse" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Цена:</label>
                <input type="text" name="price" placeholder="Введите цену" id="price" class="form-control">
            </div>
            <input type="file" class = "form-control-file" id = "image" name = "image" value="Выберите обложку"><br>
            <button type = "submit" class = "btn btn-success">Добавить</button>
        </form>
    </div>
    <div class="mx-auto border p-3 m-3">
        <div class="row">
            @foreach($books as $book)
                <div class="col-3 mb-4" style="border:0px solid ">
                    @include('layouts.book',['book' => $book])
                </div>
            @endforeach
        </div>
    </div>

@endsection
