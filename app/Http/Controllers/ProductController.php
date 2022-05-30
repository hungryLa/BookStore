<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use App\Models\Type;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Requests\editDBRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use function GuzzleHttp\Promise\all;


class ProductController extends Controller
{
    public function index()
    {
        return 'fddl';
    }

    public function category($code)
    {
        $genre = Type::where('code', '=', $code)->first();
        $genres = Type::orderBy('name')->get();
        return view('genre', ['genre' => $genre, 'types' => $genres]);
    }

    public function edit()
    {
        $authors = Creator::all()->sortBy('FName');
        $genres = Type::all()->sortBy('name');
        $books = Product::orderBy('created_at','desc')->get();
        return view('editDB', ['product' => $books, 'types' => $genres, 'creators' => $authors]);
    }

    public function book($IdBook){
        $book = Product::find($IdBook);
        //dd($book->types);
        return view('oneBook',['book'=>$book]);
    }

}
