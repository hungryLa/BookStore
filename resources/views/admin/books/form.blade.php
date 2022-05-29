@extends("admin.layouts.app")
@section("title")Книги : Форма@endsection

@section("content")
    <div class="mx-auto border p-3">
        <h2 class="text-center">{{$book ? 'Изменить' : 'Добавить'}} книгу</h2>
        <form
            action="{{$book ? route('book.update', ['id' => $book->id]) : route('book.add') }}"
            method ="POST" enctype="multipart/form-data"
        >
            @csrf
            @if($book)
                <input type="hidden" name ="id" value ="{{$book->id}}">
            @endif
            <div class="form-group">
                <label for="pubHouse">Издательство книги:</label>
                <input type="text" name="pubHouse" placeholder="Введите название книги"
                       value="{{$book ? $book->pubHouse : old('pubHouse')}}" id="pubHouse" class="form-control">
            </div>
            <div class="form-group">
                <label for="author">Выберите автора книги:</label><br>
                <select name="author_id" id="author_id" style="width:100%;">
                    @if($book)
                        @foreach($authors as $author)
                            @if($book->author_id == $author->id)
                                <option selected value="{{$author->id}}">{{$author->FName}} {{$author->SName}}</option>
                            @else
                                <option value="{{$author->id}}">{{$author->FName}} {{$author->SName}}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="0">Выберите автора</option>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->FName}} {{$author->SName}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">Название книги:</label>
                <input type="text" name="name" placeholder="Введите название книги"
                       value ="{{$book ? $book->name : old('name')}}" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="visible">Видимость:</label>
                <select name="visible" id="visible">
                    @if($book)
                        @if(!$book->visible)
                            <option selected value="0">Нет</option>
                            <option value="1">Да</option>
                        @else
                            <option value="0">Нет</option>
                            <option selected value="1">Да</option>
                        @endif
                    @else
                        <option>Выберите видимость</option>
                        <option value="0">Нет</option>
                        <option value="1">Да</option>
                    @endif
                </select>
            </div>
            <div class="form-group container">
                <label for="genre">Введите жанр книги:</label>
                @if($book)
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
                @else
                    @foreach($genres as $genre)
                        <div class = "row">
                            <div class="col-sm">
                                <input type="checkbox" name="genres[]" value="{{$genre->id}}"> {{$genre->name}}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="pubHouse">Цена книги:</label>
                <input type="text" name="price" placeholder="Введите цену"
                       value ="{{$book ? $book->price : old('price')}}" id="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="pubHouse">В наличии:</label>
                <input type="text" name="in_stock" placeholder="Введите кол-во"
                       value ="{{$book ? $book->in_stock : old('in_stock')}}" id="in_stock" class="form-control">
            </div>
            <div class="form-group mb-3 mt-3">
                @if($book)
                    <button type = "submit" name = "change" value="2" class = "btn btn-warning float-right">Поменять обложку</button>
                @endif
                <input type="file" class = "form-control-file" id = "image" name = "image" value="Выберите обложку">

            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type = "submit" name = "change" value="1" class = "btn btn-success">
                        {{$book ? 'Изменить' : 'Добавить'}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
