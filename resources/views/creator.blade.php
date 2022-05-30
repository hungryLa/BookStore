@extends("layouts.app")

@section("title")
    Произведения {{$creator->FName}} {{$creator->SName}}
@endsection

@section('content')
    <h2 style="text-align: center;" class="mb-4">{{$creator->FName}} {{$creator->SName}}</h2>

    <div class="row">
        @foreach($products as $product)
            <div class="col-3 mb-3" style="border:0px solid ">
                @include('layouts.product',['product' => $product])
            </div>
        @endforeach
    </div>
@endsection

