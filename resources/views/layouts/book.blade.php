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
            <form action="{{route('basket-add',$book->id)}}" method="post">
                @csrf
                <button type = "submit" class = "btn btn-success">В корзину</button>
                <nobr class="ml-4">{{$book->price}} руб</nobr>
            </form>
            @if(auth()->user())
                @if($user->books->where('id','=',$book->id)->first())
                    <form action="{{route('book.removeFromFavorites',$book->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить из избранного</button>
                    </form>
                @else
                    <form action="{{route('book.addFavorites',$book->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">В избранное</button>
                    </form>
                @endif
            @endif
        @endif
    </div>
</div>

