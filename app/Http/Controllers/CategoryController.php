<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
        return view('createcategory');
    }

    public function created(Request $request){
        $request->validate([
            'categoryName' => 'required'
        ]);

        category::create([
            'categoryName' => $request->categoryName
        ]);

        return redirect('/')->with('success', 'category created!');
    }
}
