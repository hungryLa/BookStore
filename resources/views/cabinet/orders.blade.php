@extends("cabinet.app")

@section("title")
    Личный кабинет.Заказы
@endsection

@section('content')
    <h2>Личный кабинет. Заказы </h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Номер заказа</th>
                <th scope="col">Статус</th>
                <th scope="col">Сумма заказа</th>
                <th scope="col">Дата оформления</th>
                <th scope="col">Дата изменения статуса</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row"><a href="{{route('cabinet.order', ['id' => $order->id])}}" class="text-decoration-none">{{$order->id}}</a></th>
                <td>{{__("local.Orders.".$order->status)}}</td>
                <td>{{$order->getFullPrice()}}</td>
                <td>{{$order->created_at->format('d-m-Y')}}</td>
                <td>{{$order->updated_at->format('d-m-Y')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('aside')
    @include('cabinet.inc.aside')
@endsection
