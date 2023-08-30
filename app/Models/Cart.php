<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=[
        'quantity',
        'item_id'
    ];

    public function Item(){
        return $this->hasMany(Item::class, 'item_id');
    }
    use HasFactory;
}
