@extends("cabinet.app")

@section("title")
    Личный кабинет. Форма
@endsection

@section('content')
    <h2>Личный кабинет. Форма </h2>
    <form action="{{route('cabinet.changeInformation')}}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="name">Имя пользователя</span>
            <input type="text" class="form-control" placeholder="Имя пользователя" name="name" id="name"
                   value="{{old('name',$user->name)}}">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="email">Email</span>
            <input type="text" class="form-control" placeholder="Email пользователя" name="email" id="email"
                   value="{{old('email',$user->email)}}">
        </div>

        <div class="input-group">
            <button type="submit" class="btn btn-outline-secondary">Изменить</button>
        </div>
    </form>
@endsection
@section('aside')
    @include('cabinet.inc.aside')
@endsection
