<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'name'     => $row[0],
            'author_id'    => $row[1],
            'pubHouse'    => $row[2],
            'price'    => $row[3],
            'visible'    => $row[4],
            'in_stock'    => $row[5],
        ]);
    }
}
