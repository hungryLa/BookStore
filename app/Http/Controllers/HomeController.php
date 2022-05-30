<?php

namespace App\Http\Controllers;

use App\Http\Requests\editDBRequest;
use App\Models\Creator;
use App\Models\Product;
use App\Models\ProductUser;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('visible', 1)->orderBy('created_at', 'desc')->get();
        $types = Type::orderBy('name')->get();
        return view('home', compact('products', 'types'));
    }

    public function search(Request $request)
    {
        $allProducts = Product::all();
        $data = $request->searchLine;
        $products = Product::where('name', 'LIKE', "%{$data}%")->get();
        $creators = Creator::where('FName', 'LIKE', "%{$data}%")->orWhere('SName', 'LIKE', "%{$data}%")->orderBy('FName')->orderBy('SName')->get();
        return view('resultSearching', compact('products', 'creators','allProducts'));
    }

    public function product($IdProduct)
    {
        $product = Product::find($IdProduct);
        return view('oneProduct', compact('product'));
    }

    public function category($code)
    {
        $type = null;
        $type = Type::where('code', '=', $code)->first();
        $types = Type::orderBy('name')->get();
        return view('type', ['type' => $type, 'types' => $types]);
    }

    // Страница автора со всеми его книгами
    public function creator($id)
    {
        $creator = Creator::find($id);
        $products = Product::where('creator_id', $id)->orderBy('created_at', 'desc')->get();
        return view('creator', compact('creator', 'products'));
    }

    // Страница формы
    public function edit()
    {
        $creators = Creator::all()->sortBy('FName');
        $types = Type::all()->sortBy('name');

        return view('editDB', ['types' => $types, 'creators' => $creators]);
    }

    // Скрипт добавление книги
    public function store(editDBRequest $request)
    {
        // Загрузка изображения на сервер
        //dd($request->price);
        $request->file('image')->store('public/');
        $nameFile = $request->file('image')->hashName();

        //Создание записи
        $product = Product::create
        ([
            'name' => $request->name,
            'creator_id' => $request->creator,
            'pubHouse' => $request->pubHouse,
            'visible' => 0,
            'price' => $request->price,
            'image' => $nameFile,
        ]);

        //Добавление жанров
        $types = $request->types;
        if (!is_null($types)) {
            foreach ($types as $type) {
                $product->types()->attach($type);
            }
        }

        if ($product) {
            session()->flash('success', 'Ваша заявка будет рассмотрена!');
        } else {
            session()->flash('warning', 'Возникли какие-то проблемы!');
        }

        return redirect()->route('editDB');
    }

    public function addFavorites($idProduct)
    {
        $user = auth()->user();
        if ($user->products()->where('status', '=', 'Favorites')->where('product_id', '=', $idProduct)->first()) {
            session()->flash('warning', 'Эта книга уже в избранных!');
        } else {
            $success = ProductUser::create([
                'user_id' => $user->id,
                'product_id' => $idProduct,
                'status' => 'Favorites',
            ]);
            if ($success) {
                session()->flash('success', 'Книга была добавлена в избранные!');
            } else {
                session()->flash('warning', 'Возникли какие-то проблемы!');
            }
        }
        return redirect()->back();
    }

    public function removeFromFavorites($idProduct)
    {
        $user = auth()->user();
        if ($user->products()->where('status', '=', 'Favorites')->where('product_id', '=', $idProduct)->first()) {
            $success = ProductUser::where('status', '=', 'Favorites')->where('product_id', '=', $idProduct)->delete();
            if ($success) {
                session()->flash('success', 'Книга была удалена из избранных!');
            } else {
                session()->flash('warning', 'Возникли какие-то проблемы!');
            }
        } else {
            session()->flash('warning', 'Эта книга не в ваших избранных!');
        }
        return redirect()->back();
    }
}
