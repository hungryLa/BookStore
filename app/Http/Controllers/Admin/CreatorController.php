<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Creator;
use Illuminate\Http\Request;
use App\Http\Requests\creatorRequest;

class CreatorController extends Controller
{
    public function index()
    {
        $creators = Creator::orderBy('FName')->orderBy('SName')->get();
        return view('admin.creators.index', compact('creators'));
    }

    public function addForm()
    {
        $creator = '';
        return view('admin.creators.form',compact('creator'));
    }

    public function add(creatorRequest $request)
    {
        $creator = Creator::create([
            'FName' => $request->FName,
            'SName' => $request->SName,
        ]);

        if ($creator)
            session()->flash('success', 'Создатель был добавлен!');
        else
            session()->flash('warning', 'Что-то пошло не так!!');

        return redirect()->route('creator.index');
    }

    public function updateForm($creatorId)
    {
        $creator = Creator::find($creatorId);
        return view('admin.creators.form', compact('creator'));
    }

    public function update(Request $request)
    {
        $creator = Creator::find($request->id);

        $creator->FName = $request->FName;
        $creator->SName = $request->SName;

        $success = $creator->save();

        if ($success)
            session()->flash('success', 'Создатель был изменен!');
        else
            session()->flash('warning', 'Что-то пошло не так!!');

        return redirect()->route('creator.index');
    }

    public function delete($creatorId)
    {
        $creator = Creator::find($creatorId);
        foreach ($creator->products() as $product){
            $product->creator_id = 0;
            dd($product);
            $product->save();
        }
        $creator->delete();
        session()->flash('success', 'Создатель был удалён!');

        return redirect()->route('creator.index');
    }

}
