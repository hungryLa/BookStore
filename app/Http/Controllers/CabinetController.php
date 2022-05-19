<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CabinetController extends Controller
{
    /*
     * Страница для вывода избранных книг
     * */
    public function favorites(){
        $user = auth()->user();
        $books = $user->books()->where('status','=','Favorites')->get();
        return view('cabinet/favorites',compact('books'));
    }
}
