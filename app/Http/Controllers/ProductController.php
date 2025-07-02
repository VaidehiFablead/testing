<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function create()
    {
        return view('product');
    }

    public function store(Request $request)

    {
        // dd($request->all()); 
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        Product::create([
            'name' => $request->name,
            'image' => 'uploads/' . $imageName,
            'description' => $request->description,  // use DB column name
            'price' => $request->price,
        ]);


        return redirect('/product')->route('product.create')->with('success', 'Product saved successfully.');
    }

    public function index()
    {
        $products = Product::all();
        return view('productView', compact('products'));
    }
}
