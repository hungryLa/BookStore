<?php

namespace App\Imports;

use App\Models\Creator;
use Maatwebsite\Excel\Concerns\ToModel;

class CreatorsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Creator([
            'SName'     => $row[0],
            'FName'    => $row[1],
        ]);
    }
}
