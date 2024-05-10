<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    

    public function index()
    {
        $categories = Category::with('books')->get();
        return response()->json($categories);
    }
    
     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
    
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }
    
      public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
    
        $category->update($request->all());
        return response()->json($category, 200);
    }
    
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
    
}
