@extends("admin.layouts.app")
@section("title")Админка-Авторы@endsection

@section("content")
    <h1>Авторы</h1>

    <a href="{{route('author.addForm')}}" class="btn btn-success">
        Добавить автора
    </a>

    @if($authors)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{$author->FName}}</td>
                    <td>{{$author->SName}}</td>
                    <td>
                        <a href = '{{route('author.updateForm',$author->id)}}'
                           class = "btn btn-warning">Изменить
                        </a>
                    </td>
                    <td>
                        <a href = '{{route('author.delete',$author->id)}}'
                           class = "btn btn-danger">Удалить
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection

