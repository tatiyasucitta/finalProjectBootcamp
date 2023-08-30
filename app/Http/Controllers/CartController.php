<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;

class CartController extends Controller
{
    public function added(request $request, $id){
        $item = Item::find($id);
        // dd($request->quantity);

        Cart::create([
            'quantity'=>$request->quantity,
            'item_id'=>$id
        ]);

        $item->update([
            'stock'=>$item->stock - $request->quantity
        ]);
        
        return redirect('/')->with('success', 'Added to cart');
    }
}
