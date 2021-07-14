<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\authorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('FName')->orderBy('SName')->get();
        return view('admin.authors.index', compact('authors'));
    }

    public function addForm()
    {
        $author = '';
        return view('admin.authors.form',compact('author'));
    }

    public function add(authorRequest $request)
    {
        $author = Author::create([
            'FName' => $request->FName,
            'SName' => $request->SName,
        ]);

        if ($author)
            session()->flash('success', 'Автор был добавлен!');
        else
            session()->flash('warning', 'Что-то пошло не так!!');

        return redirect()->route('author.index');
    }

    public function updateForm($authorId)
    {
        $author = Author::find($authorId);
        return view('admin.authors.form', compact('author'));
    }

    public function update(Request $request)
    {
        $author = Author::find($request->id);

        $author->FName = $request->FName;
        $author->SName = $request->SName;

        $success = $author->save();

        if ($success)
            session()->flash('success', 'Автор был изменен!');
        else
            session()->flash('warning', 'Что-то пошло не так!!');

        return redirect()->route('author.index');
    }

    public function delete($authorId)
    {
        $author = Author::find($authorId);
        dd($author->books());
        foreach ($author->books() as $book){
            $book->author_id = 0;
            dd($book);
            $book->save();
        }
        $author->delete();
        session()->flash('success', 'Автор был удалён!');

        return redirect()->route('author.index');
    }

}
