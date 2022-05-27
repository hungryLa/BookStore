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
            <th scope="col">Автор</th>
            <th scope="col">Издательство</th>
            <th scope="col">Кол-во</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <th scope="row">
                    <img  style="min-height: 100px;max-height: 200px;height:100%" src="{{asset('storage/books/'.$book->image)}}" alt="Обложка">
                </th>
                <td>{{$book->name}}</td>
                <td>{{$book->author ? $book->author->FName . ' ' . $book->author->SName : ''}}</td>
                <td>{{$book->pubHouse}}</td>
                <td>{{$book->pivot->count}}</td>
                <td>{{$book->getPriceForCount()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <button>Распечатать</button>
@endsection
@section('aside')
    @include('cabinet.inc.aside')
@endsection
