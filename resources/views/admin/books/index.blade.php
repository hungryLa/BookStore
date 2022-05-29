<?php
    use Illuminate\Support\Facades\Session;
?>
@extends("admin.layouts.app")
@section("title")
    Админка-Книги
@endsection

@section("content")
    <h1>Книги</h1>
    <div class="row">
        <a href='{{route('book.addForm')}}' class="btn btn-success w-auto col-1">Добавить книгу</a>
        {{--        <form action="{{route('book.import')}}" method="POST" enctype="multipart/form-data">@csrf<input type="file" name="files"><input type="submit"></form>--}}
        <div class="dropdown col-2 test">
            <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Импорт/Экспорт
            </button>
            <ul class="dropdown-menu">
{{--                <li><a href='{{route('book.import')}}' class="btn btn-warning dropdown-item">Импорт</a></li>--}}
                <li><a href="{{route('book.addExportForm')}}" class="btn btn-warning dropdown-item import">Импорт</a></li>
                <li><a href='{{route('book.export')}}' class="btn btn-success dropdown-item">Экспорт</a></li>
            </ul>
        </div>
        @if(Session::get('exportForm'))
            <hr class="mt-1">
            <form action="{{route('book.import')}}" method="POST" enctype="multipart/form-data" class="m-2">
                @csrf
                <div class="mb-3">
                    <label for="files" class="form-label"><h4>Импорт файл</h4></label>
                    <input type="file" class="form-control" name="files" id="files">
                </div>
                <input type="submit" class="btn btn-success" value="Импортировать">
                <a href="{{route('book.addExportForm')}}" class="btn btn-warning">Убрать форму</a>
            </form>
            <hr>
        @endif
    </div>




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
                        <img style="min-height: 100px;max-height: 200px;height:100%"
                             src="{{asset('storage/books/'.$book->image)}}" alt="Обложка">
                    </th>
                    <td>{{$book->pubHouse}}</td>
                    <td>{{$book->author ? $book->author->FName . ' ' . $book->author->SName : ''}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->visible ? 'Да' : 'Нет'}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        <a href='{{route('book.change',$book->id)}}'
                           class="btn btn-warning">Изменить
                        </a>
                    </td>
                    <td>
                        <a href='{{route('book.delete',$book->id)}}'
                           class="btn btn-danger">Удалить
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
