@extends('layouts.app')

@section('title','Корзина')

@section('content')
    <div class="starter-template border mx-auto p-3">
        <h1 class="text-center mb-3">Корзина</h1>
        <div class="panel">
            <table class="table table-striped text-center">
                <thead>
                <tr>
                    <th>Обложка</th>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @if($order)
                    @foreach($order->products as $product)
                        <tr>
                            <td><img width="125px" height="175px" src="{{asset('storage/products/'.$product->image)}}" alt=""></td>
                            <td><a style="text-decoration: none;"
                                   href="{{route('product',[$product->id])}}">{{$product->name}}</a></td>
                            <td>
                                <nobr class=""><span
                                        class="badge badge-secondary bg-dark">{{$product->pivot->count}}</span></nobr>
                                <div class="btn-group form-inline">
                                    <form action="{{route('basket-remove', $product)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span>
                                        </button>
                                    </form>
                                    <form action="{{route('basket-add',$product)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{$product->price}} руб</td>
                            <td>{{$product->getPriceForCount()}} руб</td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td></td>
                    <td colspan="2"></td>
                    <td>Общая стоимость:</td>
                    <td>{{$order->getFullPrice()}} рублей</td>
                </tr>
                </tbody>
            </table>
        </div>
        <form action="{{route('basket-order')}}" method="GET">
            @csrf
            <div class="form-group row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right">Оформить заказ</button>
                </div>
            </div>
        </form>
    </div>

@endsection
