<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Faktur;
use Illuminate\Support\Str;


class CartController extends Controller
{
    public function view(){
        $item = Cart::all();        
        $items = array();
        $total = 0;
        $a =0;
        for($i=0 ; $i< count($item) ; $i++){
            if(!$item[$i]->faktur_id){
                $items[$a] = $item[$i];
                $a++;
            }
        }
        
        for($i = 0 ; $i< count($items) ; $i++){
            $total += $items[$i]->item[0]->price*$items[$i]->quantity;
        }
        return view('cart', ['items'=>$items,
                    'total' => $total]);
    }
    public function added(request $request, $id){
        $item = Item::find($id);
        $ada = Cart::where('item_id', $id)->first();
        // dd($ada);
        if($ada && !$ada->faktur_id){
            $ada->quantity = $ada->quantity+$request->quantity;
            $ada->save();
        }
        else{
            Cart::create([
                'quantity'=>$request->quantity,
                'item_id'=>$id,
                'categoryId'=>$item->category_id,
            ]);
        }
        $item->update([
            'stock'=>$item->stock - $request->quantity
        ]);
        
        return redirect('/')->with('success', 'Added to cart');
    }

    public function checkout(){
        $item = Cart::all();
        $items = array();
        $a =0;
        for($i=0 ; $i< count($item) ; $i++){
            if(!$item[$i]->faktur_id){
                $items[$a] = $item[$i];
                $a++;
            }
        }
        $invoice = '000.' . rand(100,1000) . '-' . Str::random(10) . '.' . rand(100,1000);
        $faktur = Faktur::create([
            'invoice'=> $invoice
        ]);
        // $id = Faktur::latest('id')->first();
        for($i= 0 ; $i< count($items) ; $i++){
            $items[$i]->invoice_id = $invoice;
            $items[$i]->faktur_id = $faktur->id;
            $items[$i]->save();
        }
        return redirect('/faktur');
    }

    public function faktur(){
        $cart = Cart::all();
        $faktur = Faktur::latest('id')->first();
        $invoice = $faktur->invoice;
        $a =0;
        $items = array();
        for($i =0 ; $i <count($cart) ; $i++){
            if($cart[$i]->invoice_id == $invoice){
                $items[$a] = $cart[$i];
                $a++;
            }
        }
        $total = 0;
        // dd($items);  
        
        for($i = 0 ; $i< count($items) ; $i++){
            $total += $items[$i]->item[0]->price*$items[$i]->quantity;
        }
        return view('faktur', ['items'=>$items,
        'total' => $total,
        'invoice'=> $invoice]);
    }
}
