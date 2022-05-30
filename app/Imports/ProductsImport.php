<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'     => $row[0],
            'creator_id'    => $row[1],
            'producer'    => $row[2],
            'price'    => $row[3],
            'visible'    => $row[4],
            'in_stock'    => $row[5],
        ]);
    }
}
