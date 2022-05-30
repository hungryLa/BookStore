@extends("layouts.app")

@if($type)
    @section("title")
        {{$type->name}}
    @endsection

    @section('content')
        <h2 class="mb-4" style="text-align: center">{{$type->name}}</h2>

        <div class="row">

            @foreach($type->products as $product)
                <div class="col-3" style="border:0px solid ">
                    @include('layouts.product',['product' => $product])
                </div>
            @endforeach
        </div>
    @endsection
    @section('asside')
        @include('inc.aside',['types'=> $types])
    @endsection
@else
    @section('content')
        <h2 class="mb-4" style="text-align: center">404 Такого жанра нету</h2>
    @endsection
@endif
