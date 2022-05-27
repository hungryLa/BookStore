@extends("cabinet.app")

@section("title")
    Личный кабинет
@endsection

@section('content')
    <h2>Личный кабинет. Информация </h2>
    <form action="" method="GET">
        <div class="input-group mb-3">
            <span class="input-group-text" id="user_name">Имя пользователя</span>
            <input disabled type="text" class="form-control" placeholder="Имя пользователя" aria-label="Username" aria-describedby="user_name" value="{{$user->name}}">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="user_name">Номер телефона</span>
            <input disabled type="text" class="form-control" placeholder="Номер телефона" aria-label="phoneNumber" aria-describedby="phoneNumber" value="{{$user->phone}}">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="user_email">Email</span>
            <input disabled type="text" class="form-control" placeholder="Email пользователя" aria-label="user_email" aria-describedby="user_email" value="{{$user->email}}">
        </div>

        <div class="input-group">
            <button class="btn btn-outline-secondary" type="button"><a class="text-decoration-none text-reset"  href="{{route('cabinet.form')}}">Изменить информацию</a></button>
            <button class="btn btn-outline-secondary" type="button"><a class="text-decoration-none text-reset"  href="{{route('cabinet.changePassword')}}">Изменить пароль</a></button>
        </div>
    </form>
@endsection
@section('aside')
    @include('cabinet.inc.aside')
@endsection
