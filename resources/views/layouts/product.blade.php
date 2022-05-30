<?php
if (auth()->user()) {
    $user = auth()->user();
}
?>
<div class="card h-100">
    <a href="{{route('product',['id' => $product->id])}}"><img class = "card-img-top" style="min-height: 390px;max-height: 390px;height:100%" src="{{asset('storage/products/'.$product->image)}}" alt="Обложка"></a>
    <div class="card-body pb-3">
        <h5 class="card-title" style="overflow: hidden; max-height: 25px; text-overflow: ellipsis;white-space: nowrap;" title="{{$product->name}}">{{ $product->name }}</h5>
        <p class="card-text" style="opacity: .5">
            {{ $product->creator->FName }} {{ $product->creator->SName }}
        </p>
        @if(Request::is('editDB'))
            <a href="{{route('product.change',['id' => $product->id])}}" class="btn btn-warning">Изменить</a>
            <a href="{{route('product.delete',['id' => $product->id])}}" class="btn btn-danger">Удалить</a>
        @else
            <div class="row">
                <form action="{{route('basket-add',$product->id)}}" class="col-9" method="post">
                    @csrf
                    <p class="ml-4">{{$product->price}} руб</p>
                    <button type = "submit" class = "btn btn-success">В корзину</button>
                </form>
                @if(auth()->user())
                    @if($user->products->where('id','=',$product->id)->first())
                        <form action="{{route('product.removeFromFavorites',$product->id)}}" class="col-3 d-flex flex-column justify-content-end" method="post">
                            @csrf
                            <button type="submit" style="width: 36px; height: 36px;" class="btn p-0 mt-4"><img class="w-100 h-100" src="{{asset('storage/icons/star_active.png')}}" alt=""></button>
                        </form>
                    @else
                        <form action="{{route('product.addFavorites',$product->id)}}" class="col-3 d-flex flex-column justify-content-end" method="post">
                            @csrf
                            <button type="submit" style="width: 36px; height: 36px;" class="btn p-0 mt-4"><img class="w-100 h-100"  src="{{asset('storage/icons/star.png')}}" alt=""></button>
                        </form>
                    @endif
                @endif
            </div>
        @endif
    </div>
</div>

