<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'price',
        'image',
        'category_id',
        'stock'
    ];

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
