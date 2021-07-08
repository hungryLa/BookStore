@extends("admin.layouts.app")
@section("title")Админка-Заказы@endsection

@section("content")
<h1>Заказы</h1>

@if($orders)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Номер</th>
            <th scope="col">Сумма</th>
            <th scope="col">Отправлено</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->getFullPrice()}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <a href = '{{route('checkOrder',$order->id)}}'
                       class = "btn btn-success">Обработан
                    </a>
                </td>
                <td>
                    <a href = '{{route('deleteOrder',$order->id)}}'
                       class = "btn btn-danger">Удалить
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
@endsection
