@extends('layouts.app')

@section('title')Изменить БД@endsection

@section('content')
    <div class="mx-auto border p-3">
        <h2 class="text-center">Редактировать информацию</h2>
        <form action="{{ route('editDB.update', ['id' => $book->id]) }}" method ="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name ="id" value ="{{$book->id}}">
            <div class="form-group">
                <label for="name">Название книги:</label>
                <input type="text" name="name" placeholder="Введите название книги" value ="{{$book->name}}"
                       id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="author">Выберите автора книги:</label><br>
                <select name="author_id" id="author_id" style="width:100%;">
                    @foreach($authors as $author)
                        @if($book->author_id == $author->id)
                            <option selected value="{{$author->id}}">{{$author->FName}} {{$author->SName}}</option>
                        @else
                            <option value="{{$author->id}}">{{$author->FName}} {{$author->SName}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group container">
                <label for="genre">Введите жанр книги:</label>
                @foreach($genres as $genre)
                        @if($book->genres->find($genre->id))
                            <div class = "row">
                                <div class="col-sm">
                                    <input type="checkbox" checked name="genres[]" value="{{$genre->id}}"> {{$genre->name}}
                                </div>
                            </div>
                        @else
                            <div class = "row">
                                <div class="col-sm">
                                    <input type="checkbox" name="genres[]" value="{{$genre->id}}"> {{$genre->name}}
                                </div>
                            </div>
                        @endif
                @endforeach
            </div>
            <div class="form-group">
                <label for="pubHouse">Издательство книги:</label>
                <input type="text" name="pubHouse" placeholder="Введите название книги" value="{{$book->pubHouse}}"
                       id="pubHouse" class="form-control">
            </div>
            <div class="form-group">
                <label for="pubHouse">Цена книги:</label>
                <input type="text" name="price" placeholder="Введите цену" value ="{{$book->price}}"
                       id="price" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" class = "form-control-file" id = "image" name = "image" value="Выберите обложку"><br>
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type = "submit" name = "change" value="1" class = "btn btn-success">Изменить</button>
                </div>
                <div class="col-6">
                    <button type = "submit" name = "change" value="2" class = "btn btn-warning float-right">Поменять обложку</button>
                </div>
            </div>
        </form>
    </div>
@endsection
