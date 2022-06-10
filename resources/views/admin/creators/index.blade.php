@extends("admin.layouts.app")
@section("title")Админка-Создатели@endsection

@section("content")
    <h1>Создатели</h1>
    <div class="row">
        <a href='{{route('creator.addForm')}}' class="btn btn-success w-auto col-1">Добавить создателя</a>
        <div class="dropdown col-2 test">
            <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                     data-bs-toggle="dropdown" aria-expanded="false">
                Импорт/Экспорт
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{route('creator.addExportForm')}}" class="btn btn-warning dropdown-item import">Импорт</a></li>
                <li><a href='{{route('creator.export')}}' class="btn btn-success dropdown-item">Экспорт</a></li>
            </ul>
        </div>
        @if(Session::get('exportFormCreator'))
            <hr class="mt-1">
            <form action="{{route('creator.import')}}" method="POST" enctype="multipart/form-data" class="m-2">
                @csrf
                <div class="mb-3">
                    <label for="files" class="form-label"><h4>Импорт файл</h4></label>
                    <input type="file" class="form-control" name="files" id="files">
                </div>
                <input type="submit" class="btn btn-success" value="Импортировать">
                <a href="{{route('creator.addExportForm')}}" class="btn btn-warning">Убрать форму</a>
            </form>
            <hr>
        @endif
    </div>

    @if($creators)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @foreach($creators as $creator)
                <tr>
                    <td>{{$creator->id}}</td>
                    <td>{{$creator->FName}}</td>
                    <td>{{$creator->SName}}</td>
                    <td>
                        <a href = '{{route('creator.updateForm',$creator->id)}}'
                           class = "btn btn-warning">Изменить
                        </a>
                        <a href = '{{route('creator.delete',$creator->id)}}'
                           class = "btn btn-danger">Удалить
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

