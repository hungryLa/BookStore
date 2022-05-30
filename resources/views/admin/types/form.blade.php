@extends("admin.layouts.app")
@section("title")Вид : Форма@endsection

@section("content")
    <div class="mx-auto border p-3">
        <h2 class="text-center">{{$type ? 'Изменить' : 'Добавить'}} вид</h2>
        <form
            action="{{$type ? route('type.update', ['id' => $type->id]) : route('type.add') }}"
            method ="POST" enctype="multipart/form-data"
        >
            @csrf
            @if($type)
                <input type="hidden" name ="id" value ="{{$type->id}}">
            @endif
            <div class="form-group mb-2">
                <label for="name">Название вида:</label>
                <input type="text" name="name" placeholder="Введите название вида"
                       value="{{$type ? $type->name : ''}}" id="name" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="code">Код вида:</label>
                <input type="text" name="code" placeholder="Введите код вида"
                       value="{{$type ? $type->code : ''}}" id="code" class="form-control">
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type = "submit" class = "btn btn-success">
                        {{$type ? 'Изменить' : 'Добавить'}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
