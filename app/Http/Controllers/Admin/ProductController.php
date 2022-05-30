<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\editDBRequest;
use App\Imports\ProductsImport;
use App\Models\Creator;
use App\Models\Product;
use App\Models\Favorites;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use MongoDB\Driver\Session;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('producer')->orderBy('creator_id')->orderBy('name')->get();
        $types = Type::orderBy('name')->get();
        return view('admin.products.index',compact('products','types'));
    }

    public function addForm(){
        $product = '';
        $creators = Creator::orderBy('FName')->orderBy('SName')->get();
        $types = Type::orderBy('name')->get();
        return view('admin.products.form', compact('product','creators','types'));
    }

    //Добавление книги
    public function addProduct(editDBRequest $request)
    {
        // Загрузка изображения на сервер
        $request->file('image')->store('products/');
        $nameFile = $request->file('image')->hashName();

        //Создание записи
        $product = Product::create
        ([
            'name' => $request->name,
            'creator_id' => $request->creator_id,
            'producer' => $request->producer,
            'visible' => $request->visible,
            'price' => $request->price,
            'image' => $nameFile,
        ]);

        //Добавление жанров
        $types = $request->types;
        if (!is_null($types)) {
            foreach ($types as $type){
                $product->types()->attach($type);
            }
        }

        if($product){
            session()->flash('success','Книга была добавлена в корзину!');
        }else{
            session()->flash('warning','Возникли какие-то проблемы!');
        }

        return redirect()->to(route('product.index'));
    }



    // Страница изменения книги
    public function changeProduct($IdProduct)
    {
        $product = Product::find($IdProduct);
        $creators = Creator::orderBy('FName')->orderBy('SName')->get();
        $types = Type::orderBy('name')->get();

        return view('admin.products.form',compact('product','creators','types'));
    }

    // Скрипт обновления книги
    public function updateProduct(Request $req)
    {
        $product = Product::find($req->id);
        // Изменение информации
        if ($req->change == 1) {
            $product->name = $req->name;
            $product->creator_id = $req->creator_id;
            $product->producer = $req->producer;
            $product->visible = $req->visible;
            $product->price = $req->price;
            $product->in_stock = $req->in_stock;

            if($req->types){
                //Отсоединияем все записи
                $product->types()->detach();

                $types = $req->types;
                foreach ($types as $type){
                    $product->types()->attach($type);
                }
            }
        }
        // Изменение обложки
        if ($req->change == 2){
            //Удаляем старую обложку
            if($req->file('image')){
                $this->deleteCover($product->id);
                //Сохраняем новую
                $req->file('image')->store('public/products/');
                $nameFile = $req->file('image')->hashName();
                //Изменяем имя файла в записи книги
                $product->image = $nameFile;
            }
        }
        $success = $product->save();
        if($success){
            session()->flash('success','Книга была изменена!');
        }
        else{
            session()->flash('warning','Что-то пошло не так!');
        }
        return redirect()->to(route('product.index'));
    }

    // Удаление обложки книги
    public function deleteCover($IdProduct)
    {
        $product = Product::find($IdProduct);
        if ($product->image != 'null') {
            $file_path = public_path() . "/storage/products/" . $product->image;
            unlink($file_path);
            $product->image = 'null';
            $product->save();
        }
    }
    // Скрипт удалении книги
    public function deleteProduct($IdProduct): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($IdProduct);
        $this->deleteCover($IdProduct);
        $product->delete();
        session()->flash('success','Книга была удалена!');
        return redirect()->to(route('product.index'));
    }

    public function addExportForm(Request $request){
        if($request->session()->get('exportForm'))
            $request->session()->put('exportForm',False);
        else{
            $request->session()->put('exportForm',True);
        }
        return redirect()->back();
    }

    public function export(){
        return Excel::download(new ProductsExport, 'Products.xlsx');
    }
    public function import(Request $request){
        Excel::import(new ProductsImport(), $request->file('files'));
        return redirect()->back()->with('success', 'Экспорт прошёл успешно!');
    }
}
