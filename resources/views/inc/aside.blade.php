<?php
    use App\Models\Creator;
    use App\Models\Type;

    $types = Type::orderBy('name')->get();
    $creators = Creator::orderBy('SName')->orderBy('FName')->get();
?>
<div>
        <div class="list-group mt-3" style="position: fixed;">
            <form action="{{route('search')}}">
                <input type="text" name="searchLine" id="searchLine" placeholder="Поиск по сайту">
                <button type="submit">Найти</button>
            </form>
            <h4 class="mb-3" style="text-align: center;">Жанры</h4>
            @foreach($types as $type)
                <a class = "list-group-item list-group-item-action" style="color: black;" href="{{route('ProductsOfThisType',['type' => $type->code])}}">
                    {{$type->name}}
                </a>
            @endforeach
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Авторы</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($creators as $creator)
                        <li><a class="dropdown-item" href="{{route('CreatorsProducts',['id'=>$creator->id])}}">{{$creator->FName}} {{$creator->SName}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

</div>
