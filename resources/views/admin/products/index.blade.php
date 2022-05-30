<?php
    use Illuminate\Support\Facades\Session;
?>
@extends("admin.layouts.app")
@section("title")
    Админка-Продукты
@endsection

@section("content")
    <h1>Продукты</h1>
    <div class="row">
        <a href='{{route('product.addForm')}}' class="btn btn-success w-auto col-1">Добавить продукт</a>
        {{--        <form action="{{route('product.import')}}" method="POST" enctype="multipart/form-data">@csrf<input type="file" name="files"><input type="submit"></form>--}}
        <div class="dropdown col-2 test">
            <button  class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Импорт/Экспорт
            </button>
            <ul class="dropdown-menu">
{{--                <li><a href='{{route('product.import')}}' class="btn btn-warning dropdown-item">Импорт</a></li>--}}
                <li><a href="{{route('product.addExportForm')}}" class="btn btn-warning dropdown-item import">Импорт</a></li>
                <li><a href='{{route('product.export')}}' class="btn btn-success dropdown-item">Экспорт</a></li>
            </ul>
        </div>
        @if(Session::get('exportForm'))
            <hr class="mt-1">
            <form action="{{route('product.import')}}" method="POST" enctype="multipart/form-data" class="m-2">
                @csrf
                <div class="mb-3">
                    <label for="files" class="form-label"><h4>Импорт файл</h4></label>
                    <input type="file" class="form-control" name="files" id="files">
                </div>
                <input type="submit" class="btn btn-success" value="Импортировать">
                <a href="{{route('product.addExportForm')}}" class="btn btn-warning">Убрать форму</a>
            </form>
            <hr>
        @endif
    </div>




    @if($products)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Обложка</th>
                <th scope="col">Производитель</th>
                <th scope="col">Создатель</th>
                <th scope="col">Название</th>
                <th scope="col">Видимость</th>
                <th scope="col">Цена</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">
                        <img style="min-height: 100px;max-height: 200px;height:100%"
                             src="{{asset('storage/products/'.$product->image)}}" alt="Обложка">
                    </th>
                    <td>{{$product->producer}}</td>
                    <td>{{$product->creator ? $product->creator->FName . ' ' . $product->creator->SName : ''}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->visible ? 'Да' : 'Нет'}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href='{{route('product.change',$product->id)}}'
                           class="btn btn-warning">Изменить
                        </a>
                    </td>
                    <td>
                        <a href='{{route('product.delete',$product->id)}}'
                           class="btn btn-danger">Удалить
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
