@extends("cabinet.app")

@section("title")
    Личный кабинет. Изменение пароля
@endsection

@section('content')
    <h2>Изменение пароля</h2>
    <form action="{{route('cabinet.changePassword')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="old_password">Старый пароль</span>
            <input type="password" class="form-control" placeholder="Старый пароль" name="old_password" id="old_password">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="new_password">Новый пароль</span>
            <input type="password" class="form-control" placeholder="Новый пароль" name="new_password" id="new_password">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="new_password_confirmed">Проверка пароля</span>
            <input type="password" class="form-control" placeholder="Повторите ещё раз" name="new_password_confirmation" id="new_password_confirmation">
        </div>

        <div class="input-group">
            <button type="submit" class="btn btn-outline-secondary">Изменить</button>
        </div>
    </form>
@endsection
@section('aside')
    @include('cabinet.inc.aside')
@endsection
