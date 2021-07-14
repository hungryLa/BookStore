<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{

    public function index()
    {
        $genres = Genre::orderBy('name')->get();
        return view('admin.genres.index', compact('genres'));
    }

    public function addFrom()
    {
        $genre = '';
        return view('admin.genres.form',compact('genre'));
    }

    public function add(GenreRequest $request)
    {
        $genre = Genre::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);


        if ($genre)
            session()->flash('success', 'Жанр был добавлен!');
        else
            session()->flash('warning', 'Что-то пошло не так!!');

        return redirect()->route('genre.index');
    }

    public function updateFrom($genreId)
    {
        $genre = Genre::find($genreId);
        return view('admin.genres.form', compact('genre'));
    }

    public function update(Request $request)
    {
        $genre = Genre::find($request->id);

        $genre->name = $request->name;
        $genre->code = $request->code;

        $success = $genre->save();

        if ($success)
            session()->flash('success', 'Жанр был изменен!');
        else
            session()->flash('warning', 'Что-то пошло не так!!');

        return redirect()->route('genre.index');
    }

    public function delete($idGenre)
    {
        Genre::find($idGenre)->delete();
        session()->flash('success', 'Жанр был удалён!');

        return redirect()->route('genre.index');
    }

}
