<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faktur extends Model
{
    protected $fillable = [
        'invoice',
        'address',
        'postal',
    ];
    public function Cart(){
        return $this->hasMany(Cart::class,'faktur_id');
    }
    use HasFactory;
}
