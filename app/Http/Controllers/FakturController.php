<?php

namespace App\Http\Controllers;
use App\Models\Faktur;
use App\Models\Cart;


use Illuminate\Http\Request;

class FakturController extends Controller
{
    public function save(Request $request){
        // dd($request);
        $faktur = Faktur::latest('id')->first();
        
        $request->validate([
            'address'=>'required|string|min:5|max:100',
            'postal' =>'required|string|regex:/^[0-9]{5}$/'
        ]);
        $faktur->update([
            'address' =>$request->address,
            'postal' => $request->postal,
        ]);
        return redirect('/')->with('success', 'facture saved in history!');
    }
    
    public function history(){
        $faktur = faktur::All();
        return view('history', ['fakturs'=> $faktur]);
        // $ada = Cart::where('item_id', $id)->first();
    }

    public function detailinvoice($id){
        $faktur = Faktur::find($id);
        $invoice = $faktur->invoice;
        $cart = Cart::all();
        $items = array();
        $a=0;
        for($i = 0; $i < count($cart) ; $i++){
            if($cart[$i]->faktur_id == $id){
                $items[$a] = $cart[$i];
                $a++;
            }
        }
        $total =0;
        for($i =0 ; $i < $a ; $i++){
            $total += $items[$i]->item[0]->price*$items[$i]->quantity;
        }
        // dd($items);
        return view('detailInvoice', ['items'=> $items,
                                        'total'=> $total,
                                        'invoice'=> $invoice]);
    }
    
}
