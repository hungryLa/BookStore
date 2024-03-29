@extends("cabinet.app")

@section("title")
    Избранные
@endsection

@section('content')
    <h2 class="mb-4">Избранные</h2>

    <div class="row">
        @foreach($products as $product)
            <div class="col-3 mb-3" style="border:0px solid ">
                @include('layouts.product',['product' => $product])
            </div>
        @endforeach
    </div>
@endsection

@section('aside')
    @include('cabinet.inc.aside')
@endsection
