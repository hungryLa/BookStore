<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Создатель</th>
        <th>Название изображения</th>
        <th>Производитель</th>
        <th>Цена</th>
        <th>Видимость</th>
        <th>Кол-во</th>
        <th>Создано</th>
        <th>Обновлено</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td >{{ $product->name }}</td>
            <td>{{ $product->creator->FName }} {{ $product->creator->SName }}</td>
            <td>{{ $product->image }}</td>
            <td>{{ $product->producer }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->visible }}</td>
            <td>{{ $product->in_stock }}</td>
            <td>{{ $product->created_at == null ? $product->created_at : $product->created_at->format('d-m-Y') }}</td>
            <td>{{ $product->updated_at == null ? $product->updated_at : $product->updated_at->format('d-m-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
