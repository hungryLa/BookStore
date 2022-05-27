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
            <th scope="col">Статус</th>
            <th scope="col">Сумма</th>
            <th scope="col">Отправлено</th>
            <th scope="col">Последние изменения</th>
            <th scope="col">Управление</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <form action="{{route('changeOrder',$order->id)}}" method="POST">
            <tr>
                <th scope="row"><a href="{{route('admin.order',['id'=>$order->id])}}" class="text-decoration-none">{{$order->id}}</a></th>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>
                    <select name="status" id="status">
                        @for($i = 0; $i < count($status);$i++)
                            <option {{$status[$i] == $order->status ? 'selected' : ''}} value="{{$status[$i]}}" >{{__("local.Orders.".$status[$i])}}</option>
                        @endfor
                    </select>

                </td>
                <td>{{$order->getFullPrice()}}</td>
                <td>{{$order->created_at->format('d-m-Y')}}</td>
                <td>{{$order->updated_at->format('d-m-Y')}}</td>
                <td>
                    <a href = '{{route('checkOrder',$order->id)}}'
                       class = "btn btn-success">Обработан
                    </a>
                        @csrf
                        <button class = "btn btn-warning">
                            Изменить
                        </button>
                    <a href = '{{route('deleteOrder',$order->id)}}'
                       class = "btn btn-danger">Удалить
                    </a>
                </td>

            </tr>
            </form>
        @endforeach
        </tbody>
    </table>
@endif
@endsection
