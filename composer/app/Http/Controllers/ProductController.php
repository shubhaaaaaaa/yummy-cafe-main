<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        $categories = Category::all();
        return view('manager.product', compact('products','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = Category::all();

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
    
    // Store the uploaded image
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('assets/img', $imageName, 'public');
        $product->image = $imagePath;
    }
    
        $product->description = $request->description;
        $product->save();
        return redirect()->route('manager.display');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, $id)
    {
        $product = Product::with('category')->find($id);
        $categories = Category::all();
    
        return view('manager.edit_product', ['product' => $product, 'categories' => $categories]);
    }
    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
    
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
    
        // Store the uploaded image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('assets/img', $imageName, 'public');
            $product->image = $imagePath;
        }
    
        $product->description = $request->description;
    
        $product->save();
        $products = Product::all();
    
        return view('manager.display', ['product' => $product, 'categories' => $categories, 'products' => $products]);    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    // Fetch all products

    public function getAllProducts()
{
    $allProducts = Product::all();
    return $allProducts;
}
}
