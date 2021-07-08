@extends("admin.layouts.app")
@section("title")Жанры : Форма@endsection

@section("content")
    <div class="mx-auto border p-3">
        <h2 class="text-center">{{$genre ? 'Изменить' : 'Добавить'}} жанр</h2>
        <form
            action="{{$genre ? route('genre.update', ['id' => $genre->id]) : route('genre.add') }}"
            method ="POST" enctype="multipart/form-data"
        >
            @csrf
            @if($genre)
                <input type="hidden" name ="id" value ="{{$genre->id}}">
            @endif
            <div class="form-group">
                <label for="pubHouse">Название жанра:</label>
                <input type="text" name="name" placeholder="Введите название жанра"
                       value="{{$genre ? $genre->name : ''}}" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="pubHouse">Код жанра:</label>
                <input type="text" name="code" placeholder="Введите код жанра"
                       value="{{$genre ? $genre->code : ''}}" id="code" class="form-control">
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type = "submit" class = "btn btn-success">
                        {{$genre ? 'Изменить' : 'Добавить'}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
