<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_order','order_id','product_id')->withPivot('count')->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function saveOrder($name, $phone)
    {
        if ($this->status == 'Packing') {
            $this->name = $name;
            $this->phone = $phone;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }

    }
}
