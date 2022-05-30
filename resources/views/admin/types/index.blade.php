@extends("admin.layouts.app")
@section("title")Админка-Виды@endsection

@section("content")
    <h1>Виды</h1>

    <a href="{{route('type.addForm')}}" class="btn btn-success">
        Добавить вид
    </a>

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
