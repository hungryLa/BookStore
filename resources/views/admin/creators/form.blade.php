@extends("admin.layouts.app")
@section("title")Создатели : Форма@endsection

@section("content")
    <div class="mx-auto border p-3">
        <h2 class="text-center">{{$creator ? 'Изменить' : 'Добавить'}} создателя</h2>
        <form
            action="{{$creator ? route('creator.update', ['id' => $creator->id]) : route('creator.add') }}"
            method ="POST" enctype="multipart/form-data"
        >
            @csrf
            @if($creator)
                <input type="hidden" name ="id" value ="{{$creator->id}}">
            @endif
            <div class="form-group mb-2">
                <label for="FName">Имя:</label>
                <input type="text" name="FName" placeholder="Введите имя создателя"
                       value="{{$creator ? $creator->FName : old('FName')}}" id="FName" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="SName">Фамилия:</label>
                <input type="text" name="SName" placeholder="Введите фамилию создателя"
                       value="{{$creator ? $creator->SName : old('SName')}}" id="SName" class="form-control">
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type = "submit" class = "btn btn-success">
                        {{$creator ? 'Изменить' : 'Добавить'}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
