<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('manager.display', compact('products','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroyCategory(string $id)
    {
        $category = Category::find($id);
        $deletedCategoryId = $category->id;
        $category->delete();
    
        // Retrieve all categories except the one that was deleted
        $remainingCategories = Category::where('id', '<>', $deletedCategoryId)->orderBy('id')->get();
    
        // Reassign IDs to the remaining categories
        $newId = 1;
        foreach ($remainingCategories as $category) {
            $category->id = $newId++;
            $category->save();
        }
    
        return redirect()->route('manager.display');
    }

    public function destroyProduct(string $id)
{
    $product = Product::find($id);

    if (!$product) {
        // Product not found
        return redirect()->route('manager.display')->with('error', 'Product not found');
    }

    // Get the ID of the product to be deleted
    $deletedProductId = $product->id;

    // Delete the product
    $product->delete();

    // Retrieve all products ordered by ID
    $remainingProducts = Product::orderBy('id')->get();

    // Reassign IDs to the remaining products
    $newId = 1;
    foreach ($remainingProducts as $product) {
        $product->id = $newId++;
        $product->save();
    }

    return redirect()->route('manager.display')->with('success', 'Product deleted successfully');
}


public function showAllOrders()
{
    $orders = Order::all(); // Assuming you have an Order model
    return view('manager.display_orders', ['orders' => $orders]);
}

public function updateStatus(Request $request, $id)
{
    $order = Order::find($id);
    if (!$order) {
        // Handle error, return response or redirect
    }

    $status = $request->input('status');
    $order->status = $status;
    $order->save();

    return redirect()->back(); // Redirect back to the same page after updating
}
}
