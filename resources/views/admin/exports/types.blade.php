<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Код</th>
        <th>Создано</th>
        <th>Обновлено</th>
    </tr>
    </thead>
    <tbody>
    @foreach($types as $type)
        <tr>
            <td>{{ $type->name }}</td>
            <td>{{ $type->code }}</td>
            <td>{{ $type->created_at == null ? $type->created_at : $type->created_at->format('d-m-Y') }}</td>
            <td>{{ $type->updated_at == null ? $type->updated_at : $type->updated_at->format('d-m-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
