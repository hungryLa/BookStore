@extends("admin.layouts.app")
@section("title")Админка-Жанры@endsection

@section("content")
    <h1>Жанры</h1>

    <a href="{{route('genre.addForm')}}" class="btn btn-success">
        Добавить жанр
    </a>

    @if($genres)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Код</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($genres as $genre)
                <tr>
                    <td>{{$genre->name}}</td>
                    <td>{{$genre->code}}</td>
                    <td>
                        <a href = '{{route('genre.updateForm',$genre->id)}}'
                           class = "btn btn-warning">Изменить
                        </a>
                    </td>
                    <td>
                        <a href = '{{route('genre.delete',$genre->id)}}'
                           class = "btn btn-danger">Удалить
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
