<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{

    public function index()
    {
        $types = Type::orderBy('name')->get();
        return view('admin.types.index', compact('types'));
    }

    public function addFrom()
    {
        $type = '';
        return view('admin.types.form',compact('type'));
    }

    public function add(TypeRequest $request)
    {
        $type = Type::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);


        if ($type)
            session()->flash('success', 'Жанр был добавлен!');
        else
            session()->flash('warning', 'Что-то пошло не так!!');

        return redirect()->route('type.index');
    }

    public function updateFrom($typeId)
    {
        $type = Type::find($typeId);
        return view('admin.types.form', compact('type'));
    }

    public function update(Request $request)
    {
        $type = Type::find($request->id);

        $type->name = $request->name;
        $type->code = $request->code;

        $success = $type->save();

        if ($success)
            session()->flash('success', 'Жанр был изменен!');
        else
            session()->flash('warning', 'Что-то пошло не так!!');

        return redirect()->route('type.index');
    }

    public function delete($idType)
    {
        Type::find($idType)->delete();
        session()->flash('success', 'Жанр был удалён!');

        return redirect()->route('type.index');
    }

}
