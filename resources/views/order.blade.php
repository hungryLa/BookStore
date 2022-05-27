<?php
    $user = auth()->user();
?>
@extends('layouts.app')

@section('title','Оформление заказа')

@section('content')
    <div class="border mx-auto p-3">
        <h2 class="text-center mb-3">Оформление заказа</h2>
        <p class="text-center">Общая сумма заказа: <span class="font-weight-bold">{{$order->getFullPrice()}} рублей</span></p>
        <p class="text-center">Укажите свои данные для того , чтобы наш оператор связался с вами</p>
        <form action="{{route('basket-confirm')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" class="form-control" placeholder="Введите имя" value="{{$user ? $user->name : '' }}">
            </div>
            <div class="form-group">
                <label for="name">Телефон</label>
                <input type="text" name="phone" class="form-control" placeholder="Введите телефон для обратной связи" value="{{$user ? $user->phone : ''}}">
            </div>
            <div class="form-group row mt-4">
                <div class="col-10"></div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success float-right">Отправить данные</button>
                </div>
            </div>
        </form>
    </div>

@endsection
