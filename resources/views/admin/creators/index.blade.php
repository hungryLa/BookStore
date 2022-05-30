@extends("admin.layouts.app")
@section("title")Админка-Создатели@endsection

@section("content")
    <h1>Создатели</h1>

    <a href="{{route('creator.addForm')}}" class="btn btn-success">
        Добавить создателя
    </a>

    @if($creators)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @foreach($creators as $creator)
                <tr>
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

