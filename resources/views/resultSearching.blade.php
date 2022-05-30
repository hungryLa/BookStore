@extends("layouts.app")

@section("title")
    Главная
@endsection

@section('content')
    <div class="row">
        @if(count($products) != 0)
            <h2 style="text-align: center;" class="mb-4">По названию</h2>
            @foreach($products as $product)
                <div class="col-3 mb-3" style="border:0px solid ">
                    @include('layouts.product',['product' => $product])
                </div>
            @endforeach
        @endif

        @if(count($creators) != 0)
            <h2 style="text-align: center;" class="mb-4">По автору</h2>
            @foreach($creators as $creator)
                @foreach($allProducts as $product)
                    @if($product->creator_id == $creator->id)
                        <div class="col-3 mb-3" style="border:0px solid ">
                            @include('layouts.product',['product' => $product])
                        </div>
                    @endif
                @endforeach
            @endforeach
        @endif
    </div>
@endsection

@section('asside')
    @include('inc.aside')
@endsection
