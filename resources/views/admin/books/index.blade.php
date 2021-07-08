@extends("admin.layouts.app")
@section("title")Админка-Книги@endsection

@section("content")
    <h1>Книги</h1>

    <a href = '{{route('book.addForm')}}' class = "btn btn-success">Добавить книгу
    </a>

    @if($books)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Обложка</th>
                <th scope="col">Издательство</th>
                <th scope="col">Автор</th>
                <th scope="col">Название</th>
                <th scope="col">Видимость</th>
                <th scope="col">Цена</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">
                        <img  style="min-height: 100px;max-height: 200px;height:100%" src="{{asset('storage/'.$book->image)}}" alt="Обложка">
                    </th>
                    <td>{{$book->pubHouse}}</td>
                    <td>{{$book->author ? $book->author->FName . ' ' . $book->author->SName : ''}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->visible ? 'Да' : 'Нет'}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        <a href = '{{route('book.change',$book->id)}}'
                           class = "btn btn-warning">Изменить
                        </a>
                    </td>
                    <td>
                        <a href = '{{route('book.delete',$book->id)}}'
                           class = "btn btn-danger">Удалить
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
