<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CreatorsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Imports\CreatorsImport;
use App\Models\Creator;
use Illuminate\Http\Request;
use App\Http\Requests\creatorRequest;
use Maatwebsite\Excel\Facades\Excel;

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

    public function export(){
        return Excel::download(new CreatorsExport, 'Creators.xlsx');
    }

    public function addExportForm(Request $request){
        if($request->session()->get('exportFormCreator'))
            $request->session()->put('exportFormCreator',False);
        else{
            $request->session()->put('exportFormCreator',True);
        }
        return redirect()->back();
    }

    public function import(FileRequest $request){
        Excel::import(new CreatorsImport(), $request->file('files'));
        return redirect()->back()->with('success', 'Экспорт прошёл успешно!');
    }

}
