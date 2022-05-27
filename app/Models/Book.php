<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author_id',
        'pubHouse',
        'visible',
        'image',
        'price',
    ];

//Обратное отношение один ко многим (у книги 1 автор)
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function authors()
    {
        return $this->hasOne(Author::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
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
