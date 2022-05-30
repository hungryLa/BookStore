<table>
    <thead>
    <tr>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Создано</th>
        <th>Обновлено</th>
    </tr>
    </thead>
    <tbody>
    @foreach($creators as $creator)
        <tr>
            <td>{{ $creator->SName }}</td>
            <td>{{ $creator->FName }}</td>
            <td>{{ $creator->created_at == null ? $creator->created_at : $creator->created_at->format('d-m-Y') }}</td>
            <td>{{ $creator->updated_at == null ? $creator->updated_at : $creator->updated_at->format('d-m-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
