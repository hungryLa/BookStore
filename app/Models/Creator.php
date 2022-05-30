<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    protected $fillable = [
        'SName',
        'FName',
    ];
// Отношение один ко многим
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
