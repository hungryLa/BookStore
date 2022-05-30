<?php

namespace App\Exports;

use App\Models\Creator;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CreatorsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.exports.creators',[
            'creators' => Creator::all()
        ]);
    }
}
