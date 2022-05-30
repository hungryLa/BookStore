@extends("cabinet.app")

@section("title")
    Личный кабинет
@endsection

@section('content')
    <h2>Личный кабинет. Заказ № {{$order->id}} </h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Обложка</th>
            <th scope="col">Название</th>
            <th scope="col">Создатель</th>
            <th scope="col">Производитель</th>
            <th scope="col">Кол-во</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">
                    <img  style="min-height: 100px;max-height: 200px;height:100%" src="{{asset('storage/products/'.$product->image)}}" alt="Обложка">
                </th>
                <td>{{$product->name}}</td>
                <td>{{$product->creator ? $product->creator->FName . ' ' . $product->creator->SName : ''}}</td>
                <td>{{$product->producer}}</td>
                <td>{{$product->pivot->count}}</td>
                <td>{{$product->getPriceForCount()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <form action="{{route('cabinet.order.export',['id'=> $order->id])}}" method="GET">
        @csrf
        <button class="btn btn-success">Распечатать</button>
    </form>

@endsection
@section('aside')
    @include('cabinet.inc.aside')
@endsection
