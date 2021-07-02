<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Requests\editDBRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use function GuzzleHttp\Promise\all;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('price','>',0)->orderBy('created_at','desc')->get();
        $genres = Genre::orderBy('name')->get();
        //dd(session());
        return view('home', ['books' => $books, 'genres' => $genres]);
    }

    public function category($code)
    {
        $genre = Genre::where('code', '=', $code)->first();
        $genres = Genre::orderBy('name')->get();
        return view('genre', ['genre' => $genre, 'genres' => $genres]);
    }

    public function show()
    {
        dd('genre');
    }

    public function edit()
    {
        $authors = Author::all()->sortBy('FName');
        $genres = Genre::all()->sortBy('name');
        $books = Book::orderBy('created_at','desc')->get();
        return view('editDB', ['books' => $books, 'genres' => $genres, 'authors' => $authors]);
    }

    public function create(editDBRequest $req): \Illuminate\Http\RedirectResponse
    {
        $book = new book;
        $book->name = $req->input('name');
        $book->author = $req->input('author');
        $book->genre = $req->input('genre');
        $book->pubHouse = $req->input('pubHouse');
        $book->image = $req->input('image');

        $book->save();

        return redirect()->route('editDB')->with('success', 'Книга добавлена');
    }

    public function book($IdBook){
        $book = Book::find($IdBook);
        //dd($book->genres);
        return view('oneBook',['book'=>$book]);
    }

    public function store(Request $request)
    {
        // Загрузка изображения на сервер
        //dd($request->price);
        $request->file('image')->store('public/');
        $nameFile = $request->file('image')->hashName();

        //Создание записи
        $book = Book::create
        ([
            'name' => $request->name,
            'author_id' => $request->author,
            'pubHouse' => $request->pubHouse,
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

        return redirect()->route('editDB');
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

    public function deleteBook($IdBook): \Illuminate\Http\RedirectResponse
    {
        $this->deleteCover($IdBook);
        Book::find($IdBook)->delete();
        return redirect()->to(route('editDB'));
    }

    public function changeBook($IdBook)
    {
        $book = Book::find($IdBook);
        $authors = Author::all();
        $genres = Genre::all();

        return view('editBook',
            ['book' => $book, 'authors' => $authors, 'genres' => $genres]);
    }

    public function updateBook(Request $req): \Illuminate\Http\RedirectResponse
    {
        $book = Book::find($req->id);
        // Изменение информации
        if ($req->change == 1) {
            $book->name = $req->name;
            $book->author_id = $req->author_id;
            $book->pubHouse = $req->pubHouse;
            $book->price = $req->price;
            //Отсоединияем все записи
            $book->genres()->detach();

            $genres = $req->genres;
            foreach ($genres as $genre){
                $book->genres()->attach($genre);
            }
        }
        // Изменение обложки
        if ($req->change == 2) {
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
        return redirect()->to(route('editDB'));
    }

    public function allBooks()
    {
        return view('editDB', ['books' => book::all()]);
    }
}
