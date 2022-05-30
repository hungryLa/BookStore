<?php
if (auth()->user()) {
    $user = auth()->user();
}
?>
<div class="col-3">
    <img class="img-fluid" style="min-height: 450px;max-height: 450px;height:100%"
         src="{{asset('storage/products/'.$product->image)}}" alt="Обложка">
</div>
<div class="col-9">
    <h5 class="card-title">{{ $product->name }}</h5>
    <p class="card-text">
        Создатель: {{ $product->creator->FName }} {{ $product->creator->SName }} <br>
        Производитель: {{ $product->producer }}<br>
        @foreach($product->types as $type)
            <a href="{{route('ProductsOfThisType',['type'=> $type->code])}}">#{{$type->name}}</a>
    @endforeach
    <form action="{{route('basket-add',$product->id)}}" method="post">
        @csrf
        <h6>В наличии {{$product->in_stock}} шт.</h6>
        <button type="submit" class="btn btn-success">В корзину</button>
        <nobr class="ml-4">{{$product->price}} руб</nobr>
    </form>
    @if(auth()->user())
        @if($user->products->where('id','=',$product->id)->first())
            <form action="{{route('product.removeFromFavorites',$product->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Удалить из избранного</button>
            </form>
        @else
            <form action="{{route('product.addFavorites',$product->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-success">В избранное</button>
            </form>
        @endif
    @endif
    </p>
</div>

@section('asside')
    @include('inc.aside')
@endsection
