<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            font-family:DejaVu Sans;
            font-size: 10px;
        }
        tr{
            text-align: center;
        }
        td,th{
            border: 1px solid black;
        }
    </style>
</head>
<body >
    <div>
        <p style="font-size: 14px; font-weight: bold;">Заказ №{{$order->id}}</p>
        <p style="font-size: 12px;">На имя {{$order->name}}. Контактные данные: {{$order->phone}}</p>
    </div>
    <table class="table" style="border: 1px solid black; width: 100%;">
        <thead>
        <tr>
            <th scope="col">Id продукта</th>
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
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->creator ? $product->creator->FName . ' ' . $product->creator->SName : ''}}</td>
                <td>{{$product->producer}}</td>
                <td>{{$product->pivot->count}}</td>
                <td>{{$product->getPriceForCount()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p style="text-align: right; font-weight: bold">Общая сумма: {{$order->getFullPrice()}} рублей</p>
</body>
</html>

