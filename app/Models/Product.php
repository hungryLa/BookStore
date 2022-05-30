<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'creator_id',
        'producer',
        'visible',
        'image',
        'price',
        'in_stock',
    ];

//Обратное отношение один ко многим (у книги 1 автор)
    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }
    public function creators()
    {
        return $this->hasOne(Creator::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function user(){
        return $this->belongsToMany(User::class,'book_users');
    }


    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->price * $this->pivot->count;
        }
        return $this->price;
    }

}
