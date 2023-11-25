<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('manager.category', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $category = new Category;
    $category->name = $request->name;

    $category->save();
    return redirect()->route('manager.display');
}

/**
 * Display the specified resource.
 */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('manager.edit_category',['category'=>$category]);
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
    
        $category->save();
        return redirect()->route('manager.display');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //

    }
}
