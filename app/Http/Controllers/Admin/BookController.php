<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\editDBRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {

        $books = Book::orderBy('pubHouse')->orderBy('author_id')->orderBy('name')->get();
        $genres = Genre::orderBy('name')->get();
        //dd(session());
        //return view('book.index',compact('books','genres'));
        return view('admin.books.index',compact('books','genres'));
    }

    public function addForm(){
        $book = '';
        $authors = Author::orderBy('FName')->orderBy('SName')->get();
        $genres = Genre::orderBy('name')->get();
        return view('admin.books.form', compact('book','authors','genres'));
    }

    //Добавление книги
    public function addBook(editDBRequest $request)
    {
        // Загрузка изображения на сервер
        $request->file('image')->store('public/');
        $nameFile = $request->file('image')->hashName();

        //Создание записи
        $book = Book::create
        ([
            'name' => $request->name,
            'author_id' => $request->author_id,
            'pubHouse' => $request->pubHouse,
            'visible' => $request->visible,
            'price' => $request->price,
            'image' => $nameFile,
        ]);

        //Добавление жанров
        $genres = $request->genres;
        if (!is_null($genres)) {
            foreach ($genres as $genre){
                $book->genres()->attach($genre);
            }
        }

        if($book){
            session()->flash('success','Книга была добавлена!');
        }else{
            session()->flash('warning','Возникли какие-то проблемы!');
        }

        return redirect()->to(route('book.index'));
    }


    // Страница изменения книги
    public function changeBook($IdBook)
    {
        $book = Book::find($IdBook);
        $authors = Author::orderBy('FName')->orderBy('SName')->get();
        $genres = Genre::orderBy('name')->get();

        return view('admin.books.form',compact('book','authors','genres'));
    }

    // Скрипт обновления книги
    public function updateBook(Request $req)
    {
        $book = Book::find($req->id);
        // Изменение информации
        if ($req->change == 1) {
            $book->name = $req->name;
            $book->author_id = $req->author_id;
            $book->pubHouse = $req->pubHouse;
            $book->visible = $req->visible;
            $book->price = $req->price;
            //Отсоединияем все записи
            $book->genres()->detach();

            $genres = $req->genres;
            foreach ($genres as $genre){
                $book->genres()->attach($genre);
            }
        }
        // Изменение обложки
        if ($req->change == 2){
            //Удаляем старую обложку
            if($req->file('image')){
                $this->deleteCover($book->id);
                //Сохраняем новую
                $req->file('image')->store('public/');
                $nameFile = $req->file('image')->hashName();
                //Изменяем имя файла в записи книги
                $book->image = $nameFile;
            }
        }
        $success = $book->save();
        if($success){
            session()->flash('success','Книга была изменена!');
        }
        else{
            session()->flash('warning','Что-то пошло не так!');
        }
        return redirect()->to(route('book.index'));
    }

    // Удаление обложки книги
    public function deleteCover($IdBook)
    {
        $book = Book::find($IdBook);
        if ($book->image) {
            $file_path = public_path() . "/storage/" . $book->image;
            unlink($file_path);
        }
        $book->image = NULL;
        $book->save();
    }
    // Скрипт удалении книги
    public function deleteBook($IdBook): \Illuminate\Http\RedirectResponse
    {
        $this->deleteCover($IdBook);
        Book::find($IdBook)->delete();
        session()->flash('success','Книга была удалена!');
        return redirect()->to(route('book.index'));
    }
}
