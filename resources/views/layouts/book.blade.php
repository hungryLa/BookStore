<?php
if (auth()->user()) {
    $user = auth()->user();
}
?>
<div class="card h-100">
    <a href="{{route('book',['id' => $book->id])}}"><img class = "card-img-top" style="min-height: 390px;max-height: 390px;height:100%" src="{{asset('storage/books/'.$book->image)}}" alt="Обложка"></a>
    <div class="card-body pb-3">
        <h5 class="card-title" style="overflow: hidden; max-height: 25px; text-overflow: ellipsis;white-space: nowrap;" title="{{$book->name}}">{{ $book->name }}</h5>
        <p class="card-text" style="opacity: .5">
            {{ $book->author->FName }} {{ $book->author->SName }}
        </p>
        @if(Request::is('editDB'))
            <a href="{{route('book.change',['id' => $book->id])}}" class="btn btn-warning">Изменить</a>
            <a href="{{route('book.delete',['id' => $book->id])}}" class="btn btn-danger">Удалить</a>
        @else
            <div class="row">
                <form action="{{route('basket-add',$book->id)}}" class="col-9" method="post">
                    @csrf
                    <p class="ml-4">{{$book->price}} руб</p>
                    <button type = "submit" class = "btn btn-success">В корзину</button>
                </form>
                @if(auth()->user())
                    @if($user->books->where('id','=',$book->id)->first())
                        <form action="{{route('book.removeFromFavorites',$book->id)}}" class="col-3 d-flex flex-column justify-content-end" method="post">
                            @csrf
                            <button type="submit" style="width: 36px; height: 36px;" class="btn p-0 mt-4"><img class="w-100 h-100" src="{{asset('storage/icons/star_active.png')}}" alt=""></button>
                        </form>
                    @else
                        <form action="{{route('book.addFavorites',$book->id)}}" class="col-3 d-flex flex-column justify-content-end" method="post">
                            @csrf
                            <button type="submit" style="width: 36px; height: 36px;" class="btn p-0 mt-4"><img class="w-100 h-100"  src="{{asset('storage/icons/star.png')}}" alt=""></button>
                        </form>
                    @endif
                @endif
            </div>
        @endif
    </div>
</div>

