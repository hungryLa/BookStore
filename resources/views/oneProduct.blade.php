@extends("layouts.app")

@section("title"){{$product->name}}@endsection

@section('content')
<div class="row mt-5">
    @include('layouts.oneProduct',['product' => $product])
</div>

@endsection
