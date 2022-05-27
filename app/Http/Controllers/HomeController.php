<?php

namespace App\Http\Controllers;

use App\Http\Requests\editDBRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::where('visible', 1)->orderBy('created_at', 'desc')->get();
        $genres = Genre::orderBy('name')->get();
        //dd(session());
        return view('home', compact('books', 'genres'));
        //redirect()->route('home',compact('books','genres'));
    }

    public function search(Request $request)
    {
        $allBooks = Book::all();
        $data = $request->searchLine;
        $books = Book::where('name', 'LIKE', "%{$data}%")->get();
        $authors = Author::where('FName', 'LIKE', "%{$data}%")->orWhere('SName', 'LIKE', "%{$data}%")->orderBy('FName')->orderBy('SName')->get();
        return view('resultSearching', compact('books', 'authors','allBooks'));
    }

    public function book($IdBook)
    {
        $book = Book::find($IdBook);
        return view('oneBook', compact('book'));
    }

    public function category($code)
    {
        $genre = null;
        $genre = Genre::where('code', '=', $code)->first();
        $genres = Genre::orderBy('name')->get();
        return view('genre', ['genre' => $genre, 'genres' => $genres]);
    }

    // Страница автора со всеми его книгами
    public function author($id)
    {
        $author = Author::find($id);
        $books = Book::where('author_id', $id)->orderBy('created_at', 'desc')->get();
        return view('author', compact('author', 'books'));
    }

    // Страница формы
    public function edit()
    {
        $authors = Author::all()->sortBy('FName');
        $genres = Genre::all()->sortBy('name');

        return view('editDB', ['genres' => $genres, 'authors' => $authors]);
    }

    // Скрипт добавление книги
    public function store(editDBRequest $request)
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
            'visible' => 0,
            'price' => $request->price,
            'image' => $nameFile,
        ]);

        //Добавление жанров
        $genres = $request->genres;
        if (!is_null($genres)) {
            foreach ($genres as $genre) {
                $book->genres()->attach($genre);
            }
        }

        if ($book) {
            session()->flash('success', 'Ваша заявка будет рассмотрена!');
        } else {
            session()->flash('warning', 'Возникли какие-то проблемы!');
        }

        return redirect()->route('editDB');
    }

    public function addFavorites($idBook)
    {
        $user = auth()->user();
        if ($user->books()->where('status', '=', 'Favorites')->where('book_id', '=', $idBook)->first()) {
            session()->flash('warning', 'Эта книга уже в избранных!');
        } else {
            $success = BookUser::create([
                'user_id' => $user->id,
                'book_id' => $idBook,
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

    public function removeFromFavorites($idBook)
    {
        $user = auth()->user();
        if ($user->books()->where('status', '=', 'Favorites')->where('book_id', '=', $idBook)->first()) {
            $success = BookUser::where('status', '=', 'Favorites')->where('book_id', '=', $idBook)->delete();
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
