<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=[
        'quantity',
        'item_id',
        'invoice_id',
        'faktur_id'
    ];

    public function Item(){
        return $this->
        hasMany(Item::class, 'id', 'item_id');
    }
    public function Faktur(){
        return $this->
        bolngsTo(Faktur::class, 'faktur_id
        ');
    }

    use HasFactory;
}
