<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Название изображения</th>
        <th>Издательство</th>
        <th>Цена</th>
        <th>Видимость</th>
        <th>Кол-во</th>
        <th>Создано</th>
        <th>Обновлено</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td >{{ $book->name }}</td>
            <td>{{ $book->author->FName }} {{ $book->author->SName }}</td>
            <td>{{ $book->image }}</td>
            <td>{{ $book->pubHouse }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->visible }}</td>
            <td>{{ $book->in_stock }}</td>
            <td>{{ $book->created_at }}</td>
            <td>{{ $book->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
