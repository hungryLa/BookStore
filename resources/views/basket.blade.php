@extends('layouts.app')

@section('title','Корзина')
@section('content')
    <div class ="starter-template border mx-auto p-3">
        <h1 class="text-center mb-3">Корзина</h1>
        <div class="panel">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Стоимость</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->books as $book)
                        <tr>
                            <td><a style = "text-decoration: none;" href="{{route('book',[$book->id])}}">{{$book->name}}</a></td>
                            <td><nobr class=""><span class="badge badge-secondary bg-dark">{{$book->pivot->count}}</span></nobr>
                                <div class="btn-group form-inline">
                                    <form action="{{route('basket-remove',$book)}}" method="POST">
                                       @csrf
                                       <button type="submit" class="btn btn-danger">
                                           <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span>
                                       </button>
                                    </form>
                                    <form action="{{route('basket-add',$book)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{$book->price}} руб</td>
                            <td>{{$book->getPriceForCount()}} руб</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Общая стоимость:</td>
                        <td colspan="2"></td>
                        <td>{{$order->getFullPrice()}} рублей</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="{{route('basket-place')}}" method="GET">
            @csrf
            <div class="form-group row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right">Оформить заказ</button>
                </div>
            </div>
        </form>
    </div>

@endsection
