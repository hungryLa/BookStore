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

    public function books()
    {
        return $this->belongsToMany(Book::class,'book_order','order_id','book_id')->withPivot('count')->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->books as $book) {
            $sum += $book->getPriceForCount();
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
