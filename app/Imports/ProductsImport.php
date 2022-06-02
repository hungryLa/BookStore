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
        $product = new Product([
            'name'  => $row[0],
            'creator_id'    => $row[1],
            'image'    => $row[2],
            'producer'  => $row[3],
            'price' => $row[4],
            'visible'   => $row[5],
            'in_stock'  => $row[6],
            'string_types'  => $row[7],
        ]);
        return $product;
    }
}
