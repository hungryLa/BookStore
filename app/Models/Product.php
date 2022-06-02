<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'string_types',
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

    public function addTypes( string $separator){
        $array_types = explode($separator, $this->string_types);
        for ($i = 0; $i < count($array_types);$i++){
            $object = Type::where('name','like', $array_types[$i])->first();
            if($object)
                $this->types()->attach($object);
        }
    }
    public function deleteTypes(){
        if(count($this->types) != 0){
            ProductType::where('product_id','=',$this->id)->delete();
        }
    }
}
