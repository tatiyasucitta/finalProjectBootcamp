<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show(){
        $item = Item::all();
        return view('welcome', ['items'=>$item]);
    }
    public function createForm(){
        return view('add', ['cats'=> Category::all()]);
    }
    public function create(request $request){
        dd($request);

        $request->validate([
            'name'=>'required|min:5|max:80',
            'category_id' =>'required',
            'image' => 'mimes:jpeg, png, jpg',
            'price'=>'required|numeric',
            'stock'=>'required|numeric'
        ]);

        $input = $request->all();

        if($request->hasFile('image')){
            $destination_path = 'public/images/products';
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $image_name = Str::random(3) . '_' . $img_name;
            $path = $request->file('image')->storeAs($destination_path, $image_name);
        
            $input['image'] = $image_name;
        }
        
        Item::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image'=> $image_name,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        return redirect('/')->with('success', 'Item added!');
    }

    public function update($id){
        $item = Item::find($id);
        $cat = Category::all();
        return view('update', [
            'item'=>$item,
            'cat'=> $cat
        ]);
    }

    public function updated(request $request, $id){
        $item = Item::find($id);
        dd($request);

        $request->validate([
            'name'=>'required|min:5|max:80',
            'category_id' =>'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'price'=>'required|numeric',
            'stock'=>'required|numeric'
        ]);

$input = $request->all();

        if($request->hasFile('image')){
            $destination_path = 'public/images/products';
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $image_name = Str::random(10) . '_' . $img_name;
            $path = $request->file('image')->storeAs($destination_path, $image_name);
        
            $input['image'] = $image_name;
        }

        
        $item->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' =>$image_name,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        return redirect('/')->with('success', 'Item Updated!');
    }

    public function delete($id){
        $item = Item::find($id);
        $item->delete();

        return redirect('/');
    }
}
