@extends("admin.layouts.app")
@section("title")Авторы : Форма@endsection

@section("content")
    <div class="mx-auto border p-3">
        <h2 class="text-center">{{$author ? 'Изменить' : 'Добавить'}} автора</h2>
        <form
            action="{{$author ? route('author.update', ['id' => $author->id]) : route('author.add') }}"
            method ="POST" enctype="multipart/form-data"
        >
            @csrf
            @if($author)
                <input type="hidden" name ="id" value ="{{$author->id}}">
            @endif
            <div class="form-group">
                <label for="pubHouse">Имя:</label>
                <input type="text" name="FName" placeholder="Введите имя автора"
                       value="{{$author ? $author->FName : old('FName')}}" id="FName" class="form-control">
            </div>
            <div class="form-group">
                <label for="pubHouse">Фамилия:</label>
                <input type="text" name="SName" placeholder="Введите фамилию автора"
                       value="{{$author ? $author->SName : old('SName')}}" id="SName" class="form-control">
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type = "submit" class = "btn btn-success">
                        {{$author ? 'Изменить' : 'Добавить'}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
