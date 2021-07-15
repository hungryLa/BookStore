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
        return 'fddl';
    }

    public function category($code)
    {
        $genre = Genre::where('code', '=', $code)->first();
        $genres = Genre::orderBy('name')->get();
        return view('genre', ['genre' => $genre, 'genres' => $genres]);
    }

    public function edit()
    {
        $authors = Author::all()->sortBy('FName');
        $genres = Genre::all()->sortBy('name');
        $books = Book::orderBy('created_at','desc')->get();
        return view('editDB', ['books' => $books, 'genres' => $genres, 'authors' => $authors]);
    }

    public function book($IdBook){
        $book = Book::find($IdBook);
        //dd($book->genres);
        return view('oneBook',['book'=>$book]);
    }
}
