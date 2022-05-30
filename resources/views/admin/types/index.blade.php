@extends("admin.layouts.app")
@section("title")Админка-Виды@endsection

@section("content")
    <h1>Виды</h1>

    <div class="row">
        <a href='{{route('type.addForm')}}' class="btn btn-success w-auto col-1">Добавить создателя</a>
        <div class="dropdown col-2 test">
            <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                     data-bs-toggle="dropdown" aria-expanded="false">
                Импорт/Экспорт
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{route('type.addExportForm')}}" class="btn btn-warning dropdown-item import">Импорт</a></li>
                <li><a href='{{route('type.export')}}' class="btn btn-success dropdown-item">Экспорт</a></li>
            </ul>
        </div>
        @if(Session::get('exportFormType'))
            <hr class="mt-1">
            <form action="{{route('type.import')}}" method="POST" enctype="multipart/form-data" class="m-2">
                @csrf
                <div class="mb-3">
                    <label for="files" class="form-label"><h4>Импорт файл</h4></label>
                    <input type="file" class="form-control" name="files" id="files">
                </div>
                <input type="submit" class="btn btn-success" value="Импортировать">
                <a href="{{route('type.addExportForm')}}" class="btn btn-warning">Убрать форму</a>
            </form>
            <hr>
        @endif
    </div>

    @if($types)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Код</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{$type->name}}</td>
                    <td>{{$type->code}}</td>
                    <td>
                        <a href = '{{route('type.updateForm',$type->id)}}'
                           class = "btn btn-warning">Изменить
                        </a>
                        <a href = '{{route('type.delete',$type->id)}}'
                           class = "btn btn-danger">Удалить
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
