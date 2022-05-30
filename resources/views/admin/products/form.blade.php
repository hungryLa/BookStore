@extends("admin.layouts.app")
@section("title")Продукт : Форма@endsection

@section("content")
    <div class="mx-auto border p-3">
        <h2 class="text-center">{{$product ? 'Изменить' : 'Добавить'}} продукт</h2>
        <form
            action="{{$product ? route('product.update', ['id' => $product->id]) : route('product.add') }}"
            method ="POST" enctype="multipart/form-data"
        >
            @csrf
            @if($product)
                <input type="hidden" name ="id" value ="{{$product->id}}">
            @endif
            <div class="form-group mb-2">
                <label for="name">Название продукта:</label>
                <input type="text" name="name" placeholder="Введите название продукта"
                       value ="{{$product ? $product->name : old('name')}}" id="name" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label for="creator">Выберите создателя продукта:</label><br>
                <select name="creator_id" id="creator_id" style="width:100%;">
                    @if($product)
                        @foreach($creators as $creator)
                            @if($product->creator_id == $creator->id)
                                <option selected value="{{$creator->id}}">{{$creator->FName}} {{$creator->SName}}</option>
                            @else
                                <option value="{{$creator->id}}">{{$creator->FName}} {{$creator->SName}}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="0">Выберите создателя</option>
                        @foreach($creators as $creator)
                            <option value="{{$creator->id}}">{{$creator->FName}} {{$creator->SName}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="producer">Производитель продукта:</label>
                <input type="text" name="producer" placeholder="Введите производителя продукта"
                       value="{{$product ? $product->producer : old('producer')}}" id="producer" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="visible">Видимость:</label>
                <select name="visible" id="visible" style="width: 100%;">
                    @if($product)
                        @if(!$product->visible)
                            <option selected value="0">Нет</option>
                            <option value="1">Да</option>
                        @else
                            <option value="0">Нет</option>
                            <option selected value="1">Да</option>
                        @endif
                    @else
                        <option>Выберите видимость</option>
                        <option value="0">Нет</option>
                        <option value="1">Да</option>
                    @endif
                </select>
            </div>
            <div class="form-group container mb-2">
                <label for="type">Введите тип продукта:</label>
                @if($product)
                    @foreach($types as $type)
                        @if($product->types->find($type->id))
                            <div class = "row">
                                <div class="col-sm">
                                    <input type="checkbox" checked name="types[]" value="{{$type->id}}"> {{$type->name}}
                                </div>
                            </div>
                        @else
                            <div class = "row">
                                <div class="col-sm">
                                    <input type="checkbox" name="types[]" value="{{$type->id}}"> {{$type->name}}
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    @foreach($types as $type)
                        <div class = "row">
                            <div class="col-sm">
                                <input type="checkbox" name="types[]" value="{{$type->id}}"> {{$type->name}}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="form-group mb-2">
                <label for="producer">Цена продукта:</label>
                <input type="text" name="price" placeholder="Введите цену"
                       value ="{{$product ? $product->price : old('price')}}" id="price" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="producer">В наличии:</label>
                <input type="text" name="in_stock" placeholder="Введите кол-во"
                       value ="{{$product ? $product->in_stock : old('in_stock')}}" id="in_stock" class="form-control">
            </div>
            <div class="form-group mb-3 mt-3">
                @if($product)
                    <button type = "submit" name = "change" value="2" class = "btn btn-warning float-right">Поменять обложку</button>
                @endif
                <input type="file" class = "form-control-file" id = "image" name = "image" value="Выберите обложку">

            </div>
            <div class="row form-group">
                <div class="col-6">
                    <button type = "submit" name = "change" value="1" class = "btn btn-success">
                        {{$product ? 'Изменить' : 'Добавить'}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
